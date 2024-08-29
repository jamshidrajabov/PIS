<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('patients')->insert([
            'first_name' =>'Ibrohim',
            'last_name' => 'Jamolov',
            'passport' => 'KA9895858',
            'birth' => '10.06.2002', 
            'phone' => '+998994152525',
            'address' => 'Toshkent Shahar Olmaliq tumani Baliqchi mahallasi 4-ko\'cha raqamsiz uy',
            'gender' => 'erkak',
            'blood_type' => '2',
            'height' => '170',
            'weight' => '60',
            'created_at' => now(), 
            'updated_at' => now(),
        ]);
    }
}
