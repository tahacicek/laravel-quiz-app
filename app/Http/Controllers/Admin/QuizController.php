<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\QuizCreateRequest;
use App\Http\Requests\QuizUpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::withCount("questions")->paginate(5);
        return view("admin.quiz.list", compact("quizzes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.quiz.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizCreateRequest $request)
    {
  // Quiz::insert([
        //     "title"=> $request->title,
        //     "descr" => $request->descr,
        //     "finished_at"=>$request->finished_at
        // ]);

        $insert = Quiz::create($request->post());

        if ($insert) {
            toastr()->success($request->title . ' isimli quiz başarıyla eklendi!', 'Quiz Yönetimi');
            return redirect()->route("quizzes.index");
        } else {
            toastr()->error('Bir sorun oluştu!', 'Quiz Yönetimi');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $quiz = Quiz::withCount("questions")->find($id) ?? abort(404, "Böyle bir quiz bulunamadı.");
        return view("admin.quiz.edit", compact("quiz"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuizUpdateRequest $request, $id)
    {
        $quiz = Quiz::find($id) ?? abort(404, "Böyle bir quiz bulunamadı.");
      $update =  Quiz::where("id", $id)->update($request->except(["_method", "_token"]));
        if ($update) {
            toastr()->success($request->title . ' isimli quiz başarıyla güncellendi!', 'Quiz Yönetimi');
            return redirect()->route("quizzes.index");
        } else {
            toastr()->error('Bir sorun oluştu!', 'Quiz Yönetimi');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiz = Quiz::find($id) ?? abort(404, "Böyle bir quiz bulunamadı.");
       // $quiz->delete(); aynısı.
        $delete = Quiz::where("id", $id)->delete();
        if ($delete) {
            toastr()->success('Quiz başarıyla silindi!', 'Quiz Yönetimi');
            return redirect()->back();
        } else {
            toastr()->error('Silinirken bir hata oluştu!', 'Quiz Yönetimi');
        }
    }
}
