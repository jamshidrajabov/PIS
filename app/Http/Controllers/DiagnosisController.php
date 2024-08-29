<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDiagnosisRequest;
use App\Models\diagnosis;

class DiagnosisController extends Controller
{
    public function store(StoreDiagnosisRequest $request,$user_id,$id){
        
        diagnosis::create(
            [
                'description' => $request->description, 
                'period_id' => $id,
            ]
            );
            return redirect()->back();

        
    }
}
