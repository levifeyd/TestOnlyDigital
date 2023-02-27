<?php

namespace Database\Seeders;

use App\Models\Car;
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
        $car1 = Car::create([
            'brand_car'=>'Kia',
            'comfort_category'=>1,
            'driver_name'=>'Victor',
        ]);
        $car2 = Car::create([
            'brand_car'=>'Toyota',
            'comfort_category'=>2,
            'driver_name'=>'Alex',
        ]);
        $car3 = Car::create([
            'brand_car'=>'Audi',
            'comfort_category'=>3,
            'driver_name'=>'Nick',
        ]);
        $car4 = Car::create([
            'brand_car'=>'Renault',
            'comfort_category'=>1,
            'driver_name'=>'Nick',
        ]);
        $car5 = Car::create([
            'brand_car'=>'BMW',
            'comfort_category'=>3,
            'driver_name'=>'Max',
        ]);
        $car6 = Car::create([
            'brand_car'=>'Mazda',
            'comfort_category'=>2,
            'driver_name'=>'Ivan',
        ]);
        $car7 = Car::create([
            'brand_car'=>'Kia',
            'comfort_category'=>1,
            'driver_name'=>'Mark',
        ]);
    }
}
