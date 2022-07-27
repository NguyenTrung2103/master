<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class RolePermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RolePermission::factory()
            ->count(10)
            ->state(new Sequence(
                fn () => [
                    'permission_id' => Permission::all()->random(),
                    'role_id' => Role::all()->random(),
                ],
            ))
            ->create();
    }
}
