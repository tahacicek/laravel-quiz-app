<?php

namespace Database\Factories;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Quiz::class;

    public function definition()
    {
        return [
            "title" => $this->faker->sentence(rand(3,7)),
            "descr" => $this->faker->text(200),
        ];
    }
}
