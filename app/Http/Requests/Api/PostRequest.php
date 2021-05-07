<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\ApiRequest;


class PostRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() // rulesの記述でだけでOK
    {
        return [
            'question' => ['required', 'max:500'],
            'answer' => ['required', 'max:200'],
        ];
    }

    /**
     * エラーメッセージ
     */
    public function messages()
    {
        return [
            'question.required' => '問題を入力してください。',
            'question.max'   => '問題を500字以内で入力してください',
            'answer.required'  => '答えを入力してください。',
            'answer:max'     => '答えを200字以内で入力してください',
        ];
    }
}
