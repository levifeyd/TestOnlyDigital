<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\WorkersCarsCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkersCarsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1)->first();
        $workersCarsCategories = WorkersCarsCategory::query()->create([
            'worker_id'=>1,
            'cars_categories'=>1,
        ]);
    }
}
