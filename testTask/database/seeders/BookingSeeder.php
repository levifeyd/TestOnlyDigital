<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $booking = Booking::create([
//            'car_id'=>'1',
//            'worker_id'=>'1',
//            'time_start'=>'2023-02-27 12:22:18',
//            'time_end'=>'2023-02-27 14:18:18',
//        ]);
        $booking = Booking::create([
            'car_id'=>'3',
            'worker_id'=>'2',
            'time_start'=>'2023-02-27 13:22:18',
            'time_end'=>'2023-02-27 14:18:18',
        ]);
    }
}
