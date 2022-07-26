<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\User;
use App\Models\Taggable;

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
