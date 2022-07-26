<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Messages>
 */
class MessagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'room' => fake()->word(),
            'sender_type' => 'user',
            'receiver_id' => fake()->randomNumber(4, true),
            'receiver_type' => 'user',
            'content' => fake()->sentence(),
            'content_type' => 'text',
            'association_id' => fake()->randomNumber(2, true),
            'association_type' => 'null',
        ];
    }
}
