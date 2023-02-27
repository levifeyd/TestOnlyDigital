<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function getRequestFreeCars(Request $request) {
        $apiToken = $request->header('API_TOKEN');
        $user = User::query()->where('api_token', $apiToken)->first();
        if (!$user) return 'Incorrect api token';

        return $apiToken;
    }
}
