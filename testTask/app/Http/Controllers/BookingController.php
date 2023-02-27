<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller {
    public function getRequestFreeCars(Request $request) {
        $apiToken = $request->header('API_TOKEN');
        $user = User::query()->where('api_token', $apiToken)->first();
        if (!$user) return 'Incorrect api token';
        $categoriesIds = $user->carsCategories()->toArray();
        $input = json_decode($request->getContent(), true);

        if (!$input) return 'Incorrect request';
        if (array_key_exists("categories_id", $input)) {
            $categoriesIds = array_intersect($categoriesIds, $input["categories_id"]);
        }
//        $query = Car::query()->select('id', 'brand_car', 'driver_name')
//            ->whereIn('comfort_category', $categoriesIds);
        return $categoriesIds;
    }
}
