<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * テスト画面へ移動
     */
    public function test()
    {
        $questions = Question::inRandomOrder()->get();
        return view('test.test')->with([
            'questions' => $questions,
        ]);
    }

    /**
     * 採点処理
     *
     * 採点結果画面へ移動
     */
    public function store(Request $request)
    {

    }
}
