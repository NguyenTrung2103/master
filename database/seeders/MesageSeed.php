<?php

namespace Database\Seeders;

use App\Models\Messages;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class MesageSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Messages::factory()
            ->count(5)
            ->state(new Sequence(
                fn () => [
                    'sender_id' => User::all()->random(),
                ],
            ))
            ->create();
    }
}
