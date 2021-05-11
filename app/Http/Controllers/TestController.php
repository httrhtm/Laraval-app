<?php

namespace App\Http\Controllers;

use App\CorrectAnswer;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
     * 採点処理・採点結果の登録
     *
     * 採点結果画面へ移動
     */
    public function result(Request $request)
    {
        // --------------------------------------------------
        // パラメーターを取得する
        // --------------------------------------------------
        $question_ids = $request->question_id;
        $inputs = $request->input;

        //数値型に変換
        $int_ids = [];
        foreach ($question_ids as $id) {
            $int_ids[] = (int) $id;
        }

        // --------------------------------------------------
        // 答え（正解）を取得する
        // --------------------------------------------------
        $answers = CorrectAnswer::get(['questions_id', 'answer']);
        $de_answers = json_decode($answers, true); //デコード

        // --------------------------------------------------
        // 問題数、答えの数、入力値を変数に入れる
        // --------------------------------------------------
        $questions_total = count($question_ids);
        $answers_total = count($answers);
        $inputs_total = count($inputs);

        // --------------------------------------------------
        // 正誤判定を行う、正解数を取得する
        // --------------------------------------------------
        $point = 0;

        //問題の数ループする
        for($i = 0; $i < $questions_total; $i++){

            //答えの数ループする
            for($j = 0; $j < $answers_total; $j++) {

                //idとquestions_idが同じでない場合、以下の処理をスキップ
                if($int_ids[$i] !== $de_answers[$j]['questions_id']){
                    continue;
                }

                //入力値の数ループする
                for($k = 0; $k < $inputs_total; $k++) {

                    //入力値と回答が同じ場合ポイントを追加
                    if($inputs[$k] === $answers[$j]['answer']) {
                        $point++;
                        break;
                    }
                }
            }
        }

        // --------------------------------------------------
        // 正解数から得点を算出する
        // --------------------------------------------------
        $score = round(($point * 100) / $questions_total);

        // --------------------------------------------------
        // 登録処理
        // --------------------------------------------------

        // --------------------------------------------------
        // 結果画面に移動
        // --------------------------------------------------
        return view('test.result', [
            'date' => Carbon::now(), //現在時刻
            'point' => $point,
            'total' => $questions_total,
            'score' => $score
        ]);

    }
}
