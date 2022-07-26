<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\PermissionGroup;

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
            RolesPermissionSeed::class,
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
