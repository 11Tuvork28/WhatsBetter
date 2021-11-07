<?php

namespace Database\Factories;

use App\Models\Chat;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'chat_id' => Chat::factory()->Create()->id,
            'sender_id' => User::factory()->Create()->id,
            'message' => $this->faker->text(100),
        ];
    }
}
