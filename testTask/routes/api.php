<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\BookingController::class, 'getRequestFreeCars']);
