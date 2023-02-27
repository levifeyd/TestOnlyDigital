<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $car = Car::create([
            'brand_car'=>'Kia',
            'comfort_category'=>1,
            'driver_name'=>'Mark',
        ]);
    }
}
