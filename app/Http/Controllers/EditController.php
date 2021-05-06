<?php

namespace App\Http\Controllers;

use App\CorrectAnswer;
use App\Question;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
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
     * 編集画面へ移動
     */
    public function edit(Request $request)
    {
        //パラメーターを取得
        $id = $request->id;
        $question = $request->question;

        //idからanswerを取得
        $answers = CorrectAnswer::where('questions_id', $id)->get(['id', 'answer']);

        //JSON 文字列をデコードする
        $de_answers = json_decode($answers, true);

        //編集ページのviewに変数を渡して表示
        return view('edit.edit', [
            'id' => $id,
            'question' => $question,
            'answers' => $de_answers,
        ]);
    }

    /**
     * 確認画面へ移動
     */
    public function confirm(Request $request)
    {
        //パラメーターを取得
        $question_id = $request->question_id;
        $question = $request->question;
        $answer_ids = $request->answer_id;
        $answers = $request->answer;

        //確認ページのviewに変数を渡して表示
        return view('edit.confirm', [
            'question_id' => $question_id,
            'question' => $question,
            'answer_ids' => $answer_ids,
            'answers' => $answers
        ]);
    }

    /**
     * 編集処理
     */
    public function update(Request $request)
    {
        //パラメーターを取得
        $question_id = $request->question_id;
        $edit_question = $request->question;
        $answer_ids = $request->answer_id;
        $answers = $request->answer;

        //-------------------------------------
        //questionの更新
        //-------------------------------------
        //find：一件だけ取得
        $question = Question::find($question_id);

        $question -> question = $edit_question;
        $question -> save();

        //-------------------------------------
        //answerの更新
        //-------------------------------------
        for ($i = 0; $i < count($answers); $i++) {

            CorrectAnswer::where('id',$answer_ids[$i])->update(['answer'=>$answers[$i]]);
        }

        return redirect('list');
    }
}
