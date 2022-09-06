<?php

namespace Database\Factories;

use App\Models\Result;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResultFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Result::class;

    public function definition()
    {
        return [
            "user_id" => rand(1, 10),
            "quiz_id" => rand(1, 10),
            "point" => rand(0,100),
            "correct" => rand(0,20),
            "wrong" => rand(0,20),
        ];
    }
}
