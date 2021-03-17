<?php

namespace Database\Factories;

use App\Models\TextMessage;
use Illuminate\Database\Eloquent\Factories\Factory;

class TextMessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TextMessage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'to' => $this->faker->phoneNumber,
            'body' => $this->faker->text,
        ];
    }
}
