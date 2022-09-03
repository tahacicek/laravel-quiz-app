<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Question::class;

    public function definition()
    {
        return [
            "quiz_id" => rand(1,10),
            "question" =>  $this->faker->sentence(rand(3,7)),
            "answer1" =>  $this->faker->sentence(rand(1,3)),
            "answer2" =>  $this->faker->sentence(rand(1,3)),
            "answer3" =>  $this->faker->sentence(rand(1,3)),
            "answer4" =>  $this->faker->sentence(rand(1,3)),
            "empty" =>  "boş",
            "correct_answer" =>  "answer".rand(1,4)
        ];
    }
}
