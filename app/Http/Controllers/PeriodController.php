<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Period;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeriodController extends Controller
{
    public function left($user_id,$id){
        $period=Period::findOrFail($id);        
        $currentDateTime = Carbon::now();

        if ($period->user_id!=auth()->user()->id)
        {
            abort(403, 'Unauthorized action.');
        }

        $period->date_end = $currentDateTime->format('Y-m-d');
        $period->save();
        
        return redirect()->back();
    }
    public function create($user_id,$id){
        
        $patient = Patient::findOrFail($id);
        $periodsWithNullDateEnd = $patient->periods()->whereNull('date_end')->get();
        $periods = DB::table('periods')
        ->select('name_disease', DB::raw('count(*) as total')) // Har bir `name_disease` va uning takrorlanish sonini tanlaymiz
        ->groupBy('name_disease') // `name_disease` bo'yicha guruhlaymiz
        ->orderBy('total', 'desc') // Takrorlanish soni bo'yicha kamayish tartibida tartiblash
        ->limit(5) // Eng ko'p takrorlangan 5 ta qiymatni olish
        ->get();
    
    // Natijani ko'rish
    
        if ($periodsWithNullDateEnd->isEmpty()) {
            return view('user.periods.create',[
                'patient'=>$patient,
                'periods'=>$periods
            ]);
        } 
        else 
        {
            abort(403, 'Bu bemor hozir kasalxonada');
        }
    }
    public function store(Request $request,$user_id,$id){
       
        $patient = Patient::findOrFail($id);
        $periodsWithNullDateEnd = $patient->periods()->whereNull('date_end')->get();
        if ($periodsWithNullDateEnd->isEmpty()) {
            $period=new Period();
            $period->user_id=auth()->user()->id;
            $period->patient_id=$patient->id;
            $period->name_disease=$request->name_disease;
            $period->description=$request->description;
            $period->date_start=Carbon::now()->format('Y-m-d');
            $period->save();         
            return redirect()->route('patient.about',['user_id'=>$user_id,'id'=>$id]);
        } 
        else 
        {
            abort(403, 'Bu bemor hozir kasalxonada');
        }
        
        
        
    }
}
