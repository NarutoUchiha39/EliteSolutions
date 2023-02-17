<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Questions>
 */
class QuestionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'Questions' => fake()->text(10),
            'solution' => fake()->text(100),
            'Code'=> fake()->text(50),
            'Language'=> array_rand(array_flip(["Python","Java","C++"]),1)
        ];
    }
}
