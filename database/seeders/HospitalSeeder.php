<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HospitalSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('hospitals')->insert([
            'name' => 'Fillial_1',
            'address' => 'Qoraqalpog\'iston Respublikasi Amudaryo tumani',
            'created_at' => now(), 
            'updated_at' => now(),
            
        ]);
    }
}
