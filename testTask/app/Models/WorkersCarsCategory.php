<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkersCarsCategory extends Model {
    use HasFactory;
    protected $table = 'workers_cars_categories';
    use HasFactory;
    protected $fillable = [
        'worker_id',
        'cars_categories'
    ];
    public $timestamps = false;
}
