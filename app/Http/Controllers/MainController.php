<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Result;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use PHPUnit\Framework\Constraint\Count;
use Illuminate\Database\Eloquent\Collection;

class MainController extends Controller
{
    public function dashboard()
    {
        $quizzes = Quiz::where("status", "publish")->where(function($query){
            $query->whereNull("finished_at")->orWhere("finished_at", ">", now());
        })->withCount("questions")->paginate(3);
        // return User::with("results");
        $results =  auth()->user()->results;
        return view("dashboard", compact("quizzes", "results"));
    }
    public function quiz_detail($slug)
    {
        $quiz = Quiz::whereSlug($slug)->with("my_result", "topTen.user")->withCount("questions")->first() ?? abort(404, "Quiz Bulunamadı!");
        return view("quiz_detail", compact("quiz"));
    }
    public function quiz($slug)
    {
        $quiz = Quiz::whereSlug($slug)->with("questions.my_answer", "my_result")->first() ?? abort(404, "Quiz Bulunamadı");
        if ($quiz->my_result) {
            toastr()->success('Quiz sonuç sayfasına yönlendirildiniz.', 'Quiz Yönetimi');
            return view("quiz_result", compact("quiz"));
        }

        return view("quiz", compact("quiz"));
    }
    public function result(Request $request, $slug)
    {
        $quiz = Quiz::with("questions")->whereSlug($slug)->first() ?? abort(404, "Quiz Bulunamadı");
        $correct = 0;
        if ($quiz->my_result) {
            abort(404, "Bu Quize'daha önce katıldınız.");
        }
        foreach ($quiz->questions as $question) {
            Answer::create([
                "user_id" => auth()->user()->id,
                "question_id" => $question->id,
                "answer" => $request->post($question->id)
            ]);
            if ($question->correct_answer === $request->post($question->id)) {
                $correct += 1;
            }
        }

        $point = round((100 / count($quiz->questions)) * $correct);
        $wrong = count($quiz->questions) - $correct;

        $create =  Result::create([
            "user_id" => auth()->user()->id,
            "quiz_id" => $quiz->id,
            "point" =>  $point,
            "correct" => $correct,
            "wrong" => $wrong,
        ]);

        if ($create) {
            toastr()->success($quiz->title . ' quizini başaryışa tamamladınız!' . " $point " . 'Puan Aldınız.');
            return redirect()->route("dashboard");
        } else {
            toastr()->error('Bir sorun oluştu!', 'Quiz Yönetimi');
            return redirect()->back();
        }
    }
}
