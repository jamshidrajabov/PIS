<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\diagnosis;
use App\Models\Drug;
use App\Models\Hospital;
use App\Models\Patient;
use App\Models\Period;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    public function index(){
        $periods = auth()->user()->periods()->distinct('patient_id')->get(['patient_id']);

        // Har bir periodga tegishli patientlarning malumotlarini olish
        $patients = Patient::whereIn('id', $periods->pluck('patient_id'))->get();
        $drugCounts = DB::table('drug_period')
        ->select('drug_id', DB::raw('count(*) as total'))
        ->groupBy('drug_id')
        ->orderBy('total', 'desc')
        ->limit(5)
        ->get();

    // Top-5 tavsiya etilgan dorilarni olish
    $drugIds = $drugCounts->pluck('drug_id')->toArray();

    // Dori vositalarini olish va tartibini saqlash
    $drugs = Drug::whereIn('id', $drugIds)
        ->orderByRaw('FIELD(id, ' . implode(',', $drugIds) . ')')
        ->get();

    // Dori vositalariga ularning sonlarini qo'shish
    foreach ($drugs as $drug) {
        $drug->total = $drugCounts->where('drug_id', $drug->id)->first()->total;
    }
        return view('user.patients.mypatients',[
            'patients'=>$patients,
            'drugs'=>$drugs
        ]);
    }

    public function currentindex(){
        $periods = auth()->user()->periods()->distinct('patient_id')->where('date_end', null)->get(['patient_id']);

        // Har bir periodga tegishli patientlarning malumotlarini olish
        $patients = Patient::whereIn('id', $periods->pluck('patient_id'))->get();
        $drugCounts = DB::table('drug_period')
        ->select('drug_id', DB::raw('count(*) as total'))
        ->groupBy('drug_id')
        ->orderBy('total', 'desc')
        ->limit(5)
        ->get();

    // Top-5 tavsiya etilgan dorilarni olish
    $drugIds = $drugCounts->pluck('drug_id')->toArray();

    // Dori vositalarini olish va tartibini saqlash
    $drugs = Drug::whereIn('id', $drugIds)
        ->orderByRaw('FIELD(id, ' . implode(',', $drugIds) . ')')
        ->get();

    // Dori vositalariga ularning sonlarini qo'shish
    foreach ($drugs as $drug) {
        $drug->total = $drugCounts->where('drug_id', $drug->id)->first()->total;
    }
            return view('user.patients.mycurrentpatients',[
            'patients'=>$patients,
            'drugs'=>$drugs
        ]);
    }

    public function show($user_id,$id){
        $patient=Patient::findOrFail($id);
        // if ($patient->user_id!=auth()->user()->id)
        // {
        //     abort(403, 'Unauthorized action.');
        // }
        
        $periods = Period::where('patient_id', $id)->orderBy('id','desc')->paginate(1);
        return view('user.patients.about',[
            'patient'=>$patient,
            'periods'=>$periods,
            'muallif'=>$user_id
        ]);
    }
   
    public function edit($user_id,$id){
        $patient=Patient::findOrFail($id);
        $lastPeriod = $patient->periods()->orderBy('created_at', 'desc')->first();
        if (($lastPeriod && is_null($lastPeriod->date_end) && $lastPeriod->user_id==auth()->user()->id) or (auth()->user()->role_id==1)) {
        $patient=Patient::findOrFail($id);
        return view('user.patients.edit',[
           'patient'=>$patient 
        ]);
    }
    else
    {
        return redirect()->route('patient.about',[
            'user_id'=>auth()->user()->id,
            'id'=>$patient->id,
        ])->with('message','Bu bemor hozirda sizga tegishli emas!!!');
    }
    }
    public function update(UpdatePatientRequest $request,$user_id,$id){
        $patient=Patient::findOrFail($id);
        $lastPeriod = $patient->periods()->orderBy('date_end', 'desc')->first();
        if (($lastPeriod && is_null($lastPeriod->date_end) && $lastPeriod->user_id==auth()->user()->id) or (auth()->user()->role_id==1)) {
           
            $patient->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'passport' => $request->passport,
                'birth' => $request->birth,
                'phone' => $request->phone,
                'address' => $request->address,
                'gender' => $request->gender,
                'blood_type' => $request->blood_type,
                'height' => $request->height,
                'weight'=> $request->weight
            ]); 
           
        }
        return redirect()->route('patient.about',[
                'user_id'=>auth()->user()->id,
                'id'=>$patient->id,
            ]);
       
        
    }
    public function store(StorePatientRequest $request,$user_id){

        
        $patient = Patient::where('passport', $request->passport)->first();

        if ($patient) {
            $periods = Period::where('patient_id', $patient->id)->orderBy('id','desc')->paginate(2);
        return redirect()->route('patient.about',[
            'user_id'=>auth()->user()->id,
            'id'=>$patient->id,
        ])->with('error', 'Bunday pasport seriya va raqamga ega bemor oldindan ro\'yxatga olinganligi bois shunday malumotga ega bemor haqidagi oyna ochildi!');
      }

        $patient = Patient::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'passport' => $request->passport,
            'birth' => $request->birth,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'blood_type' => $request->blood_type,
            'height' => $request->height,
            'weight' => $request->weight,
        ]);

        $periods = Period::where('patient_id', $patient->id)->orderBy('id','desc')->paginate(2);
        return redirect()->route('patient.about',[
            'user_id'=>auth()->user()->id,
            'id'=>$patient->id,
        ])->with('success', 'Bemor muvaffaqiyatli qo\'shildi!');    
    
    }
    public function search(Request $request){
        $query = Patient::query();
        if ($request->has('q')) {
            $search = $request->input('q');
            $query->where('first_name', 'like', "%{$search}%")
            ->orWhere('passport', 'like', "%{$search}%")->orWhere('last_name', 'like', "%{$search}%");
        }
        $patients = $query->orderBy('last_name', 'asc')->paginate(10);

        return view('user.index', compact('patients'));
    }
    public function patients(){
        $patients = Patient::whereHas('periods', function ($query) {
            $query->whereNull('date_end');
        })->with(['periods' => function ($query) {
            $query->whereNull('date_end');
        }])->paginate(10);
        $drugCounts = DB::table('drug_period')
        ->select('drug_id', DB::raw('count(*) as total'))
        ->groupBy('drug_id')
        ->orderBy('total', 'desc')
        ->limit(5)
        ->get();

    // Top-5 tavsiya etilgan dorilarni olish
    $drugIds = $drugCounts->pluck('drug_id')->toArray();

    // Dori vositalarini olish va tartibini saqlash
    $drugs = Drug::whereIn('id', $drugIds)
        ->orderByRaw('FIELD(id, ' . implode(',', $drugIds) . ')')
        ->get();

    // Dori vositalariga ularning sonlarini qo'shish
    foreach ($drugs as $drug) {
        $drug->total = $drugCounts->where('drug_id', $drug->id)->first()->total;
    }
        return view('admin.patient.patients', [
            'patients' => $patients,
            'drugs' => $drugs,
        ]);
    }

}
