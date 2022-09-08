<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $this->call([
            UserSeeder::class,
            QuizSeeder::class,
            QuestionSeeder::class,
            AnswerSeeder::class,
            ResultSeeder::class,
        ]);
    }
}
