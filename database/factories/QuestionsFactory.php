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
            'title' => fake()->text(10),
            'difficulty' => array_rand(array_flip(["easy","medium","hard"]),1),
            'category' => array_rand(array_flip(["Linked List","Arrays","Hash Map"]),1),
            'url'=> fake()->text(10),
            'languages'=> array_rand(array_flip(["Python","Java","C++"]),1)
        ];
    }
}
