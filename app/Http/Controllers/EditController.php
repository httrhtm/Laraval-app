<?php

namespace App\Http\Controllers;

use App\CorrectAnswer;
use App\Question;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


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
        //---------------------------
        //パラメーターを取得
        //---------------------------
        $question_id = $request->id;
        $question = $request->question;

        //---------------------------
        //idからanswerを取得
        //---------------------------
        $answers = CorrectAnswer::where('questions_id', $question_id)->get(['id', 'answer']);

        //---------------------------
        //JSON 文字列をデコードする
        //---------------------------
        $de_answers = json_decode($answers, true);

        //---------------------------
        //編集画面へ移動
        //---------------------------
        return view('edit.edit', [
            'question_id' => $question_id,
            'question' => $question,
            'answers' => $de_answers,
        ]);
    }

    /**
     * 確認画面へ移動
     */
    public function confirm(Request $request)
    {
        //---------------------------
        //パラメーターを取得
        //---------------------------
        $question_id = $request->question_id;
        $question = $request->question;
<<<<<<< HEAD
        $answer_ids = $request->answer_id;
        $answers = $request->answers;
=======
        $answer_ids = $request->answer_ids;
        $answers = $request->answers;

        //---------------------------
        // バリデーション
        //---------------------------
        $rules = [
            'question' => ['required', 'string', 'max:500'],
            'answers.*' => ['required', 'string', 'max:200'],
        ];

        $message = [
            'question.required' => '問題を入力してください。',
            'question.max' => '問題を500字以内で入力してください。',
            'answers.*.required' => '答えを入力してください。',
            'answers.*.max' => '答えを200字以内を入力してください。',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        //エラー時の処理
        if ($validator->fails()) {
            return redirect()->route('edit.edit', ['id' => $question_id, 'question' => $question])
            ->withErrors($validator);
        }
>>>>>>> 041c2922048321919e0069da6548daf3f9b04afb

        //---------------------------
        //確認画面へ移動
        //---------------------------
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
        //---------------------------
        //パラメーターを取得
        //---------------------------
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

            if (isset($answer_ids[$i])) {

                CorrectAnswer::where('id',$answer_ids[$i])->update(['answer'=>$answers[$i]]);

            } else {
                //---------------------------
                //現在時刻を取得
                //---------------------------
                $now = Carbon::now();

                $array = [];
                //1つずつanswerに入れる
                for ($i = 0; $i < count($answers); $i++) {

                    $data = [
                        'answer' => $answers[$i],
                        'questions_id' => $question_id,
                        'created_at' => $now
                    ];
                    $array[]= $data; //データを配列に入れる
                }

                DB::table('correct_answers')-> insert($array);
            }
        }

        return redirect('list');
    }
}
