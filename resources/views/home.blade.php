<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<link href="{{ asset('css/top.css') }}" rel="stylesheet">
</head>
<body>
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">TOP</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h2>ようこそ、{{ Auth::user()->name }}さん</h2>

                    You are logged in!
                </div>

                <ul class="top-menue">

					@if ($admin == 1)
                	<li><a href="{{ action('ListController@index') }}">問題と答えを確認・登録する ＞</a></li>
					@endif

                	<li><a href="">テストをする ＞</a></li>

                	<li><a href="">過去の採点結果をみる ＞</a></li>

					@if ($admin == 1)
                	<li><a href="">ユーザを追加・編集する　＞</a></li>
                	@endif

				</ul>

            </div>
        </div>
    </div>
</div>
@endsection

</body>
</html>
