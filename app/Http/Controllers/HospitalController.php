<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Models\Period;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->input('filter', 'all'); // Default filter 'all'

        $query = Hospital::query();

        if ($filter === 'new') {
            // Address ustunida "nōmalum" so'zi bor hospitallarni tanlaymiz
            $query->where('address', 'like', '%nōmalum%');
        }

        $hospitals = $query->orderBy('name', 'desc')->paginate(5); // 10 tadan paginate

        foreach ($hospitals as $hospital) {
            // Har bir hospital uchun bog'langan periods ma'lumotini olish
            $hospital->periods = Period::whereHas('user', function ($query) use ($hospital) {
                $query->where('hospital_id', $hospital->id);
            })->whereNull('date_end')->get();
        }
        return view('admin.hospital.hospitals',['hospitals'=>$hospitals,'filter' => $filter]);
    }
    public function create()
    { 
        return view('admin.hospital.create');
    }
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => ['required', 'string', 'max:255','unique:hospitals,name'],
            'address' => ['required', 'string', 'max:300','unique:hospitals,address'],
        ]);
        $hospital=Hospital::create([
            'name' => $request->name,
            'address' => $request->address,
        ]);
        return redirect()->back();
    }
    public function edit($id)
    { 
        $hospital=Hospital::findOrFail($id);
       
        return view('admin.hospital.edit',['hospital'=>$hospital]);
    }
    public function update(Request $request, $id)
    { 
        $request->validate([
            'name' => ['required', 'string', 'max:255','unique:hospitals,name,'. $id],
            'address' => ['required', 'string', 'max:300','unique:hospitals,address,'. $id],
        ]);
        $hospital=Hospital::findOrFail($id);
        $hospital->update([
            'name' => $request->name,
            'address' => $request->address,
        ]);
        return redirect()->route('hospital.index');
    }
}
