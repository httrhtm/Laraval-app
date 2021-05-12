<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class ListController extends Controller
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
     * ユーザー一覧へ移動
     */
    public function index()
    {
        $users = User::whereIn('deleteflag', ["0"])->get();
        return view('user.list')->with([
            'users' => $users
        ]);
    }
}
