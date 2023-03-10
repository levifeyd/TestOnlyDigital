<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BookingController extends Controller {
    public function getRequestFreeCars(Request $request) {
        $apiToken = $request->header('API_TOKEN');
        $user = User::query()->where('api_token', $apiToken)->first();
        if (!$user) return 'Incorrect api token';
        $categoriesIds = $user->carsCategories()->toArray();
        $input = json_decode($request->getContent(), true);

        $error = $this->validation($input);
        if (!$error) {
            if (array_key_exists("categories_id", $input))
                $categoriesIds = array_intersect($categoriesIds, $input["categories_id"]);
            $query = Car::query()->select('id', 'brand_car', 'driver_name')
                ->whereIn("comfort_category", $categoriesIds);
            if (array_key_exists("brands_cars", $input)) $query->whereIn('brand_car', $input['brands_cars']);
            return $this->getAvailableCars($query->get(), $input['time_start'], $input['time_end']);
        } else {
            return $error;
        }
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

    public function validation($input) {
        $result = 0;
        if (!array_key_exists('time_start', $input)) $result = "Field time_start is required";
        if (!array_key_exists('time_end', $input)) $result = "Field time_end is required";
        if (!$result && Carbon::parse($input['time_start'])->gte(Carbon::parse($input['time_end']))) $result = "Wrong data";
        return $result;
    }
}
