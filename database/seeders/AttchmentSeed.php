<?php

namespace Database\Seeders;

use App\Models\Attchment;
use Illuminate\Database\Seeder;

class AttchmentSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attchment::factory(5)->create();
    }
}
