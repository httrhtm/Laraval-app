<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\CorrectAnswer;

class ListController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $questions = Question::all();
        $answers = CorrectAnswer::all();
        return view('list')->with([
            'questions' => $questions,
            'answers' => $answers,
        ]);
    }
}
