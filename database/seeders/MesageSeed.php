<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Messages;

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
