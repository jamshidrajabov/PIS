<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            ['name' => 'Admin',
            'role_id' => 1,
            'hospital_id' =>1,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('11111111'),
            'created_at' => now(), 
            'updated_at' => now(),],
            ['name' => 'Doctor',
            'role_id' => 2,
            'hospital_id' =>1,
            'email' => 'doctor@gmail.com',
            'password' => Hash::make('11111111'),
            'created_at' => now(), 
            'updated_at' => now(),],
            ['name' => 'User',
            'role_id' => 2,
            'hospital_id' =>1,
            'email' => 'user@gmail.com',
            'password' => Hash::make('11111111'),
            'created_at' => now(), 
            'updated_at' => now(),],
            ['name' => 'Manager',
            'role_id' => 1,
            'hospital_id' =>1,
            'email' => 'manager@gmail.com',
            'password' => Hash::make('11111111'),
            'created_at' => now(), 
            'updated_at' => now(),],
            ['name' => 'Foydalanuvchi',
            'role_id' => 2,
            'hospital_id' =>1,
            'email' => 'userr@gmail.com',
            'password' => Hash::make('11111111'),
            'created_at' => now(), 
            'updated_at' => now(),],

        ]);
    }
}
