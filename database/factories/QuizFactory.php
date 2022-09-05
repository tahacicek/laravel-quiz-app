<?php

namespace Database\Factories;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
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
        $title = $this->faker->sentence(rand(3,7));
        return [
            "title" => $title,
            "descr" => $this->faker->text(200),
            "slug" => Str::slug($title)
        ];
    }
}
