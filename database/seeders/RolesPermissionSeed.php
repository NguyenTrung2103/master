<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use App\Models\RolesPermission;
use App\Models\Permission;
use App\Models\Role;

class RolesPermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RolesPermission::factory()
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
