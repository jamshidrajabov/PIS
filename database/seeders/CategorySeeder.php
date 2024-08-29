<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Yangi',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'name' => 'Og\'riq qoldiruvchi',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'name' => 'Shamollash va gripp',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'name' => 'O\'smaga qarshi',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            
        ]);
    }
}
