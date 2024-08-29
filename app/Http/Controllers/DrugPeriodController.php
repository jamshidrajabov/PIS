<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use App\Models\Patient;
use App\Models\Period;
use Illuminate\Http\Request;

class DrugPeriodController extends Controller
{
    public function store(Request $request, $user_id, $id)
    {
        $request->validate([
            'inputs.*' => 'nullable|string|max:255',
            'messages.*' => 'nullable|string|max:255',
        ]);
        
        $inputs = $request->input('inputs');
        $messages = $request->input('messages');
        $filteredMessages = [];
        
        $patient = Patient::findOrFail($id);
        $period = $patient->periods()->latest()->first();
        
        if ($period) {
            foreach ($inputs as $index => $drugName) {
                if (!empty($drugName)) {
                    // Dori mavjudligini tekshirish yoki yaratish
                    $drug = Drug::firstOrCreate(
                        ['name' => $drugName],
                        ['description' => 'nomalum', 'category_id' => 1]
                    );
        
                    // Tegishli xabarni olish
                    $message = $messages[$index] ?? null;
        
                    // Dori va xabarni period bilan bog'lash
                    $period->drugs()->attach($drug->id, ['message' => $message]);
                }
            }
        }
        
        return redirect()->route('patient.about', [
            'user_id' => auth()->user()->id,
            'id' => $id,
        ]);
        
    }
}
