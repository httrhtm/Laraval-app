<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;

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

    /**
     * 登録画面へ移動
     */
    public function create()
    {
        return view('user.register.create');
    }

    /**
     * 確認画面へ移動
     */
    public function confirm(Request $request)
    {
        //---------------------------
        // バリデーション
        //---------------------------
        $rules = [
            'user_name' => ['required', 'regex:/^[a-zA-Z0-9]+$/', ],
            'password' => ['required', 'regex:/^[a-zA-Z0-9]+$/', 'min:8', 'confirmed'],
            'password_confirmation' => ['required'],
        ];

        $message = [
            'user_name.required' => 'ユーザー名を入力してください。',
            'user_name.regex' => 'ユーザー名を半角英数字で入力してください。',
            'password.required' => 'パスワードを入力してください。',
            'password.regex' => 'パスワードを半角英数字で入力してください',
            'password.min' => 'パスワードを８文字以上で入力してください',
            'password.confirmed' => 'パスワードが一致しません。',
            'password_confirmation.required' => 'パスワード確認を入力してください。',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        //エラー時の処理
        if ($validator->fails()) {
            return redirect()->route('user.register.create')
            ->withErrors($validator);
        }


        //---------------------------
        //パラメーターを変数に代入
        //---------------------------
        $user_name = $request->user_name;
        $pass = $request->password;
        $pass_conf = $request->password_confirmation;
        $admin_check = $request->admin_check;

        //---------------------------
        // 確認画面に移動
        //---------------------------
        return view('user.register.confirm', [
            'user_name' => $user_name,
            'pass' => $pass,
            'pass_conf' => $pass_conf,
            'admin_check' => $admin_check
        ]);
    }

    /**
     * 登録処理
     *
     * 一覧画面へ移動
     */
    public function store(Request $request)
    {
        //---------------------------
        //パラメーターを変数に代入
        //---------------------------
        $user_name = $request->user_name;
        $pass = $request->pass;
        $admin_check = $request->admin_check;

        $user = new User();
        $user->name = $user_name;
        $user->password = Hash::make($pass);
        $user->admin_flag = $admin_check;
        $user->save();

        return redirect()->route('user.list');
    }
}
