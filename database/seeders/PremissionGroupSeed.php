<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PremissionGroupSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Models\Supplide)
        DB::table('permission_groups')->insert([
            [
                'name' => 'Permission Group',
            ],
            [
                'name' => 'Permission',
            ],
            [
                'name' => 'Role',
            ],
        ]);
    }
}
