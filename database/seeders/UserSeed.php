<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->state([
                'name' => 'root',
                'email' => 'root@gmail.com',
                'username' => 'root',
                'password' => Hash::make('123'),
                'type' => User::TYPES['admin'],
                'verified_at' => now(),
            ])
            ->create();
    }
}
