<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('phones')->insert([
            [
                'brand' => 'Samsung',
                'model' => 'Galaxy S23 Ultra',
                'desc' => 'Samsung Galaxy S23 Ultra',
                'price' => '21999000',
                'stock' => '3'
            ],
            [
                'brand' => 'Samsung',
                'model' => 'Galaxy Z Fold 5',
                'desc' => 'Samsung Galaxy Fold 5',
                'price' => '29999000',
                'stock' => '3'
            ],
            [
                'brand' => 'Samsung',
                'model' => 'Galaxy Z Flip 5',
                'desc' => 'Samsung Galaxy Z Flip 5',
                'price' => '17999000',
                'stock' => '3'
            ],
            [
                'brand' => 'Apple',
                'model' => 'iPhone 15 Pro Max',
                'desc' => 'Apple iPhone 15 Pro Max',
                'price' => '23999000',
                'stock' => '3'
            ],
            [
                'brand' => 'Apple',
                'model' => 'iPhone 14 Pro Max',
                'desc' => 'Apple iPhone 14 Pro Max',
                'price' => '18999000',
                'stock' => '3'
            ],
            [
                'brand' => 'Huawei',
                'model' => 'P50 Pro',
                'desc' => 'Huawei P50 Pro',
                'price' => '14999000',
                'stock' => '3'
            ],
            [
                'brand' => 'Xiaomi',
                'model' => '12 Pro',
                'desc' => 'Xiaomi 12 Pro',
                'price' => '10999000',
                'stock' => '3'
            ],
        ]);
    }
}
