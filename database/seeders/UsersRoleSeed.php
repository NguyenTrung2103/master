<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersRoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $roles = Role::all();

        if ($role = $roles->firstWhere('name', 'Administrator')) {
            if ($user = $users->firstWhere('name', 'root')) {
                DB::table('users_roles')->insert([
                    'user_id' => $user->id,
                    'role_id' => $role->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
