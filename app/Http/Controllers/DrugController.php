<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Drug;
use App\Models\Drug_Period;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use HTMLPurifier;
use HTMLPurifier_Config;
class DrugController extends Controller
{
    // DrugController.php
public function search(Request $request)
{
    $query = $request->input('query');
    $drugs = Drug::where('name', 'LIKE', "%{$query}%")->get();

    return response()->json($drugs);
}

    public function index(Request $request)
    {
        $query = Drug::query();
        if ($request->has('qq')) {
            $search = $request->input('qq');
            $query->where('name', 'like', "%{$search}%");
        }
        if ($request->has('letter')) {
            $search = $request->input('letter');
            $query->where('name', 'like', "{$search}%");
        }
        $drugs = $query->orderBy('name', 'asc')->paginate(15);
        $drugCounts = DB::table('drug_period')
        ->select('drug_id', DB::raw('count(*) as total'))
        ->groupBy('drug_id')
        ->orderBy('total', 'desc')
        ->limit(5)
        ->get();

    // Top-5 tavsiya etilgan dorilarni olish
    $drugIds = $drugCounts->pluck('drug_id')->toArray();

    // Dori vositalarini olish va tartibini saqlash
    $drugsx = Drug::whereIn('id', $drugIds)
        ->orderByRaw('FIELD(id, ' . implode(',', $drugIds) . ')')
        ->get();

    // Dori vositalariga ularning sonlarini qo'shish
    foreach ($drugsx as $drugx) {
        $drugx->total = $drugCounts->where('drug_id', $drugx->id)->first()->total;
    }
        
        if (auth()->user()->role_id ==1)
        {
            return view('admin.drugs.index',[
            
                'drugs'=>$drugs,
                'drugsx'=>$drugsx
            ]);
        }
        else
        {
            return view('user.drugs.index',[
            
                'drugs'=>$drugs,
                'drugsx'=>$drugsx
            ]);
        }
        
    }
    public function destroy($id)
    {
    $drug = Drug::find($id);

    if ($drug) {
        $drug->delete();
        return redirect()->route('drugs.index')->with('success', 'Dori muvaffaqiyatli o\'chirildi');
    }

    return redirect()->route('admin.users')->with('error', 'User topilmadi');
}
    public function create()
    {   
        // $categories = Category::pluck('name');
        return view('admin.drugs.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:drugs,name',
            'description' => 'required',
            'category'=>'required'
        ]);
    
        // HTML Purifier bilan tozalash
        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);
        $clean_html = $purifier->purify($request->input('description'));
    
        $drug = new Drug();
        $drug->name = $request->input('name');
        $drug->description = $clean_html; // Tozalangan HTML saqlanadi
        

        $categoryName = $request->input('category');
        $category = Category::where('name', $categoryName)->first();

        // Agar kategoriya mavjud bo'lmasa, yangi kategoriya yaratamiz
        if (!$category) {
            $category = Category::create(['name' => $categoryName]);
        }
        $drug->category_id=$category->id;
        $drug->save();
            return redirect()->route('drugs.index');
        }
        public function show($id)
    {   
        $drug=Drug::findOrFail($id);
        $drugId = $drug->id;

        $count = DB::table('drug_period')
           ->where('drug_id', $drugId)
           ->count();

           $similars = Drug::whereHas('category', function ($query) use ($drug) {
            $query->where('name', $drug->category->name);
        })->where('id', '!=', $id)
        ->withCount('periods') // 'periods' - drug_period jadvalining `Drug` modeliga tegishli bo'lgan funksiyasi
        ->orderBy('periods_count', 'desc') // eng ko'p uchraganlarni tartiblash
        ->limit(3) // eng ko'p uchragan 3 ta recordni olish
        ->get();
    
        return view('admin.drugs.about',
        [
            'drug'=>$drug,
            'count'=>$count,
            'similars'=>$similars
        ]);
    }
    public function edit($id)
    {   
        
        $drug=Drug::findOrFail($id);
        return view('admin.drugs.edit',
        [
            'drug'=>$drug,
        ]);
    }
    public function update(Request $request, $id)
    {   
        $drug=Drug::findOrFail($id);
        $request->validate([
            'name' => 'required|unique:drugs,name,' . $id, // $id bilan ayni dorini tekshirmaslik
            'description' => 'required',
            'category' => 'required'
        ]);
         // HTML Purifier bilan tozalash
         $config = HTMLPurifier_Config::createDefault();
         $purifier = new HTMLPurifier($config);
         $clean_html = $purifier->purify($request->input('description'));
        
         
 
         $categoryName = $request->input('category');
         $category = Category::where('name', $categoryName)->first();
 
         // Agar kategoriya mavjud bo'lmasa, yangi kategoriya yaratamiz
         if (!$category) {
             $category = Category::create(['name' => $categoryName]);
         }
        $drug->update([
            'name' => $request->input('name'),
            'description' => $clean_html,
            'category_id' => $category->id,
        ]);
        return redirect()->route('drug.about',['id'=>$id]);
    }
}
