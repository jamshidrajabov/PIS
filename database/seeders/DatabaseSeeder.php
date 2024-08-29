<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(CategorySeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(HospitalSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PatientSeeder::class);
        $this->call(DrugSeeder::class);
        $this->call(PeriodSeeder::class);
        $this->call(DrugPeriodSeeder::class);
        $this->call(DiagnosisSeeder::class);
        $this->call(ChatSeeder::class);
        
    }
}
