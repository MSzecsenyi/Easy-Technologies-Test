<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'user1',
            'email' => 'user1@nn.nn',
            'password' => bcrypt('password'),
        ])->roles()->attach(1);

        User::create([
            'name' => 'user2',
            'email' => 'user2@nn.nn',
            'password' => bcrypt('password'),
        ])->roles()->attach(2);

        User::create([
            'name' => 'user3',
            'email' => 'user3@nn.nn',
            'password' => bcrypt('password'),
        ])->roles()->attach([1, 2]);

        User::create([
            'name' => 'user4',
            'email' => 'user4@nn.nn',
            'password' => bcrypt('password'),
        ]);


        $lastWeek = Carbon::now()->subWeek();
        User::create([
            'name' => 'registeredLastWeek',
            'email' => 'user5@nn.nn',
            'password' => bcrypt('password'),
            'created_at' => $lastWeek,
        ]);
    }
}
