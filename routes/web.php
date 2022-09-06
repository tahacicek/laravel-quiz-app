<?php

use App\Http\Controllers\Admin\QuestionController;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get("/dashboard", [MainController::class, "dashboard"])->name("dashboard");
    Route::get("/quiz/detay/{slug}", [MainController::class, "quiz_detail"])->name("quiz.detail");
    Route::get("/quiz/{slug}", [MainController::class, "quiz"])->name("quiz.join");
    Route::post("/quiz/{slug}/result", [MainController::class, "result"])->name("quiz.result");
});

Route::group(["middleware" => ["auth", "isAdmin"], "prefix" => "admin", ],function(){
    Route::resource("quizzes", QuizController::class);
    Route::resource("quiz/{quiz_id}/questions", QuestionController::class);
});


