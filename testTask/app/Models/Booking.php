<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model {
    use HasFactory;

    protected $fillable = [
        'car_id',
        'worker_id',
        'time_start',
        'time_end',

    ];
    public $timestamps = false;
    public function getCarId() {
        return $this->belongsTo(Car::class);
    }
}
