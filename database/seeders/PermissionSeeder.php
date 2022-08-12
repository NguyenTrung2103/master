<?php

namespace Database\Seeders;

use App\Models\PermissionGroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissionGroups = PermissionGroup::all();
        if ($permissionGroup = $permissionGroups->firstWhere('name', 'Permission Group')->id) {
            DB::table('permissions')->insert([
                [
                    'name' => 'Permission Group: Index',
                    'key' => 'view-any-permission-group',
                    'permission_group_id' => $permissionGroup,
                ],
                [
                    'name' => 'Permission Group: Show',
                    'key' => 'view-permission-group',
                    'permission_group_id' => $permissionGroup,
                ],
                [
                    'name' => 'Permission Group: Create',
                    'key' => 'create-permission-group',
                    'permission_group_id' => $permissionGroup,
                ],
                [
                    'name' => 'Permission Group: Edit',
                    'key' => 'update-permission-group',
                    'permission_group_id' => $permissionGroup,
                ],
                [
                    'name' => 'Permission Group: Delete',
                    'key' => 'delete-permission-group',
                    'permission_group_id' => $permissionGroup,
                ],
            ]);
        }
        if ($permission = $permissionGroups->firstWhere('name', 'Permission')->id) {
            DB::table('permissions')->insert([
                [
                    'name' => 'Permission: Index',
                    'key' => 'view-any-permission',
                    'permission_group_id' => $permission,
                ],
                [
                    'name' => 'Permission: Show',
                    'key' => 'view-permission',
                    'permission_group_id' => $permission,
                ],
                [
                    'name' => 'Permission: Create',
                    'key' => 'create-permission',
                    'permission_group_id' => $permission,
                ],
                [
                    'name' => 'Permission: Edit',
                    'key' => 'update-permission',
                    'permission_group_id' => $permission,
                ],
                [
                    'name' => 'Permission: Delete',
                    'key' => 'delete-permission',
                    'permission_group_id' => $permission,
                ],
            ]);
        }
        if ($role = $permissionGroups->firstWhere('name', 'Role')->id) {
            DB::table('permissions')->insert([
                [
                    'name' => 'Role: Index',
                    'key' => 'view-any-role',
                    'permission_group_id' => $role,
                ],
                [
                    'name' => 'Role: Show',
                    'key' => 'view-role',
                    'permission_group_id' => $role,
                ],
                [
                    'name' => 'Role: Create',
                    'key' => 'create-role',
                    'permission_group_id' => $role,
                ],
                [
                    'name' => 'Role: Edit',
                    'key' => 'update-role',
                    'permission_group_id' => $role,
                ],
                [
                    'name' => 'Role: Delete',
                    'key' => 'delete-role',
                    'permission_group_id' => $role,
                ],
            ]);
        }
    }
}
