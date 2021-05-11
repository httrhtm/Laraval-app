<?php

namespace App\Http\Controllers;

use App\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class HistoryController extends Controller
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
     * 履歴画面へ移動
     */
    public function index()
    {
        $user_id = Auth::id();

        $history = History::where('users_id', $user_id)->get();

        $user = User::where('id', $user_id)->get();

        return view('history')->with([
            'history' => $history,
            'user_name' => $user[0]['name']
        ]);
    }
}
