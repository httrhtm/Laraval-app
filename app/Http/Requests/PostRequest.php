<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'question' => ['required', 'max:500'],
            'answer.*' => ['required', 'max:200'],
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
