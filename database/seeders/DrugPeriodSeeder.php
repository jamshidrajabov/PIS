<?php

namespace Database\Seeders;

use App\Models\Drug;
use App\Models\Period;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DrugPeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $drugs = Drug::all();
        $periods = Period::all();

        
        foreach ($drugs as $drug) {
            $syncData = [];
            foreach ($periods as $period) {
                $syncData[$period->id] = [
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'message' => '3 mahal. ovqatdan keyin. 1 ta tabletkadan', // message ustunini qo'shish
                ];
            }
            // Pivot jadvalga ma'lumot qo'shish
            $drug->periods()->syncWithoutDetaching($syncData);
        }
    }
}
