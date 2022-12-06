<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>fake()->numberBetween(1,10),
            'category_id'=>fake()->numberBetween(1,10),
            'title'=>Str::random(30),
            'description'=>Str::random(200),
            'views'=>fake()->numberBetween(1,10),
        ];
    }
}
