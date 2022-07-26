<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Taggable;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class TaggableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Taggable::factory()
            ->count(16)
            ->state(new Sequence(
                fn () => [
                    'tag_id' => Tag::all()->random(),
                    'taggable_id' => User::all()->random(),
                ],
            ))
            ->create();
    }
}
