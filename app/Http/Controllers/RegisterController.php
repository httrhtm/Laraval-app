<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\CorrectAnswer;

class RegisterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // 追加用のフォーム画面へ移動
    public function create()
    {
        return view('register.create');
    }

    // 実際の追加処理
    // listへ移動
    public function store(Request $request)
    {
        $question = new Question();
        $answer = new CorrectAnswer();

        $question->question = $request->question;
        $answer->answer = $request->answer;

        $question->save();
        $answer = new Question();

        return redirect('list');
    }
}
