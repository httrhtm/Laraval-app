<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<link href="{{ asset('css/result.css') }}" rel="stylesheet">
</head>
<body>
@extends('layouts.app_top')
@section('content')
<div class="result">
	<h3 class="title">テスト結果</h3>
		<div class="result-list">
				<!-- ログインユーザー名 -->
				<p>{{ Auth::user()->name }}さん</p>

				<!-- 問題数と正解数 -->
				<P>{{ $total }}問中{{ $point }}問正解です。</P>

				<!-- 点数 -->
				<P>{{ $score }}点でした。</P>
		</div>

		<!-- 現在時刻 -->
		<p class="date">{{ $date }}</p>
</div>
@endsection
</body>
</html