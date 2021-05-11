<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use PHPUnit\Framework\MockObject\Verifiable;

class HomeController extends Controller
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
        // --------------------------------------------------
        // ログインユーザーを取得する
        // --------------------------------------------------
        $auths = Auth::id();

        // --------------------------------------------------
        // ユーザーをDBから取得する
        // --------------------------------------------------
        $admin = User::where('id', $auths)->get(['admin_flag']);

        //---------------------------
        //JSON 文字列をデコードする
        //---------------------------
        $de_admin = json_decode($admin, true);

        return view('home')->with([
            'admin' => $de_admin[0]['admin_flag']
        ]);
    }
}
