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
        $user1 = User::find(1)->first();
        $workersCarsCategories1 = WorkersCarsCategory::query()->create([
            'worker_id'=>1,
            'cars_categories'=>1,
        ]);
        $user2 = User::find(1)->first();
        $workersCarsCategories2 = WorkersCarsCategory::query()->create([
            'worker_id'=>1,
            'cars_categories'=>2,
        ]);
        $user3 = User::find(2)->first();
        $workersCarsCategories3 = WorkersCarsCategory::query()->create([
            'worker_id'=>2,
            'cars_categories'=>1,
        ]);
        $user4 = User::find(2)->first();
        $workersCarsCategories4 = WorkersCarsCategory::query()->create([
            'worker_id'=>2,
            'cars_categories'=>2,
        ]);
    }
}
