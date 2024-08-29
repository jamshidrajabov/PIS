<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DiagnosisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('diagnoses')->insert([
            'period_id' => 1,
            'description' =>'Kasalxonada hozir ahvoli yaxshi',
            'created_at' => now(), 
            'updated_at' => now(),]);
    }
}
