<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

        //---------------------------
        //パラメーターを変数に代入
        //---------------------------
        $user_name = $request->user_name;
        $pass = $request->pass;
        $pass_conf = $request->pass_conf;
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
        $user->password = $pass;
        $user->admin_flag = $admin_check;
        $user->save();

        return redirect()->route('user.list');
    }
}
