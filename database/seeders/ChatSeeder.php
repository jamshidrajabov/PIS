<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chats')->insert([
            ['user_id' => 2,
            'message' => 'Iltimos menga ba\'zi kasalliklar haqida yordam kerak.',
            'to' =>1,
            'created_at' => now(), 
            'updated_at' => now(),],
            ['user_id' => 1,
            'message' => 'Salom',
            'to' =>2,
            'created_at' => now(), 
            'updated_at' => now(),],
           
            

        ]);
    }
}
