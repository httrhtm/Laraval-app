<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

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
        $user_id = $request->user_id;
        $admin_flag = $request->admin_flag;
        $user_name = $request->user_name;

        //idからanswerを取得
        $password = User::where('id', $user_id)->get(['password']);

        //確認ページのviewに変数を渡して表示
        return view('user.delete.confirm', [
            'user_id' => $user_id,
            'admin_check' => $admin_flag,
            'user_name' => $user_name,
            'password' => $password[0]['password']
        ]);
    }

    /**
     * 論理削除
     */
    public function destroy(Request $request)
    {
        //パラメーターを取得
        $user_id = $request->user_id;

        User::where('id', $user_id)->update(['deleteflag' => "1"]);

        return redirect()->route('user.list');
    }

}
