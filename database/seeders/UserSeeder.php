<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
        [
            'username' => 'Zyan Mujadid Alkanza', 
            'email' => 'zyan.mujaddid@gmail.com',
            'password' => '123',
            'role' => '1'
        ],
        [
            'username' => 'Azhari Nur Fauzi', 
            'email' => 'azhari.fauzi@gmail.com',
            'password' => '123',
            'role' => '2'
        ],
        [
            'username' => 'Vickry Satria', 
            'email' => 'vickry.satria@gmail.com',
            'password' => '123',
            'role' => '2'
        ],
        [
            'username' => 'Muhammad Ikbal', 
            'email' => 'm.ikbal@gmail.com',
            'password' => '123',
            'role' => '2'
        ],
        [
            'username' => 'Theo Laksono', 
            'email' => 'theo.laksono@gmail.com',
            'password' => '123',
            'role' => '2'
        ]
        ]);
    }
}
