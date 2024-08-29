<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('periods')->insert([
            'patient_id' => 1,
            'user_id' => 2,
            'name_disease' => 'Gripp',
            'description' =>'Ushbu bemor oldin bizga kelmagan. Shamollash holatlari mavjud. Temperatura 39 gradusni tashkil etmoqda. Tomoqda qizarish bor. Burun yallig\'langan.',
            'date_start' => '2024-07-05',
            'date_end' => '2024-07-25',
            'created_at' => now(), 
            'updated_at' => now(),]);
        DB::table('periods')->insert([
            'patient_id' => 1,
            'user_id' => 2,
            'name_disease' => 'Insult',
            'description' =>'Ushbu bemor oldin gripp sabab kasalxonada davolangan. Insult tashxisi bilan kasalxonaga yotqizildi.',
            'date_start' => '2024-08-05',
            'date_end' => '2024-08-15',
            'created_at' => now(), 
            'updated_at' => now(),]);
    }
}
