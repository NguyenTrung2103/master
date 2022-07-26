<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PremissionGroupSeed::class,
            PermissionSeeder::class,
            RoleSeed::class,
            RolePermissionSeed::class,
            SchoolSeed::class,
            UserSeed::class,
            UsersRoleSeed::class,
            TagSeed::class,
            TaggableSeed::class,
            AttchmentSeed::class,
            MesageSeed::class,
        ]);
    }
}
