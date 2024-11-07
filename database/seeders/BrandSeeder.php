<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::create([
            'device_id' => '1',
            'name' => 'Redmi',
        ]);

        Brand::create([
            'device_id' => '1',
            'name' => 'Oppo',
        ]);

        Brand::create([
            'device_id' => '2',
            'name' => 'I phone'
        ]);
    }
}
