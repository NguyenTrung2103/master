<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\UsersRole;

class UsersRoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UsersRole::factory()
            ->count(16)
            ->state(new Sequence(
                fn () => [
                    'user_id' => User::all()->random(),
                    'roles_id' => Role::all()->random(),
                ],
            ))
            ->create();
    }
}
