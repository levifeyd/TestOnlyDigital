<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model {
    use HasFactory;

    protected $fillable = [
        'brand-car',
        'comfort_category',
        'driver_name',
    ];
    public $timestamps = false;

    public function users() {
        return $this->belongsToMany(User::class);
    }
    public function getBookings() {
        return $this->hasMany(Booking::class, 'car_id')->get();
    }
}
