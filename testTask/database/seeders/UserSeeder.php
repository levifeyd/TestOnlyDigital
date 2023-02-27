<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'email' => 'ivan@mail.ru',
            'password' => bcrypt('ivan'),
            'api_token' => bcrypt('u1'),
        ]);
        $user2 = User::create([
            'email' => 'artem@mail.ru',
            'password' => bcrypt('artem'),
            'api_token' => bcrypt('u2'),
        ]);
    }
}
