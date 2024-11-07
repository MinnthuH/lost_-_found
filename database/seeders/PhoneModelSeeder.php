<?php

namespace Database\Seeders;

use App\Models\PhoneModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhoneModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PhoneModel::create([
            'brand_id' => 1, // Refers to existing brand ID in `devices` table
            'model' => 'Note 14 Pro',
            'color' => 'white,green,black,purple',
            'status' => '1',
            'image' => 'null',
            'description' => 'Something',
        ]);

        PhoneModel::create([
            'brand_id' => 3, // Refers to existing brand ID in `devices` table
            'model' => '15 Pro Max',
            'color' => 'white,green,black,purple',
            'status' => '1',
            'image' => 'null',
            'description' => 'Something',
        ]);

        PhoneModel::create([
            'brand_id' => 2, // Refers to existing brand ID in `devices` table
            'model' => 'Reno 8',
            'color' => 'white,green,black,purple',
            'status' => '1',
            'image' => 'null',
            'description' => 'Something',
        ]);

        PhoneModel::create([
            'brand_id' => 3, // Refers to existing brand ID in `devices` table
            'model' => '16 Pro Max',
            'color' => 'white,green,black,purple',
            'status' => '1',
            'image' => 'null',
            'description' => 'Something',
        ]);
    }
}
