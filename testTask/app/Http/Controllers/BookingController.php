<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BookingController extends Controller {
    public function getRequestFreeCars(Request $request) {

        $request->validate([
            'time_start'=>'required',
            'time_end'=>'required'
        ]);

        $apiToken = $request->header('API_TOKEN');
        $user = User::query()->where('api_token', $apiToken)->first();
        if (!$user) return 'Incorrect api token';
        $categoriesIds = $user->carsCategories()->toArray();
        $input = json_decode($request->getContent(), true);

        if (!$input) return 'Incorrect request';
        if (array_key_exists("categories_id", $input)) {
            $categoriesIds = array_intersect($categoriesIds, $input["categories_id"]);
        }
        $query = Car::query()->select('id', 'brand_car', 'driver_name')
            ->whereIn("comfort_category", $categoriesIds);

        if (array_key_exists("brands_cars", $input))
            $query->whereIn('brand_car', $input['brands_cars']);

//        if (!array_key_exists('time_start', $input)) return "Field time_start is required";
//        if (!array_key_exists('time_end', $input)) return "Field time_end is required";
        if (Carbon::parse($input['time_start'])->gte(Carbon::parse($input['time_end']))) return "Wrong data";

        return $this->getAvailableCars($query->get(), $input['time_start'], $input['time_end']);
    }
    public function getAvailableCars($cars, $timeStart, $timeEnd) {
        $availableCarsArray = [];
        $i = 0;
        foreach ($cars as $car) {
            $availableBooking = true;
            $bookings = $car->getBookings();
            foreach ($bookings as $booking) {
                if (Carbon::parse($timeStart)->lte(Carbon::parse($booking->time_end))
                    && Carbon::parse($timeEnd)->gte(Carbon::parse($booking->time_start))) {
                    $availableBooking = false;
                }
            }
            if ($availableBooking) {
                $availableCarsArray[$i] = $car;
                $i++;
            }
        }
        return $availableCarsArray;
    }
}
