<?php

namespace App\Http\Controllers;

use App\CorrectAnswer;
use Illuminate\Http\Request;
use App\Question;

class DeleteController extends Controller
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
     * 確認画面へ移動
     */
    public function confirm(Request $request)
    {
        //パラメーターを取得
        $id = $request->id;
        $question = $request->question;

        //idからanswerを取得
        $answers = CorrectAnswer::where('questions_id', $id)->get(['id', 'answer']);

        //JSON 文字列をデコードする
        $de_answers = json_decode($answers, true);

        //確認ページのviewに変数を渡して表示
        return view('delete.confirm', [
            'id' => $id,
            'question' => $question,
            'answers' => $de_answers,
        ]);
    }

    /**
     * 削除処理
     */
    public function destroy(Request $request)
    {
        //パラメーターを取得
        $question_id = $request->question_id;
        $answer_ids = $request->answer_id;

        Question::find($question_id)->delete();

        foreach ($answer_ids as $id){

            CorrectAnswer::where('id', $id)->delete();
        }

        return redirect('list');
    }
}
