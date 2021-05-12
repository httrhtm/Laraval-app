<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
<script src="{{ asset('js/form.js') }}"></script>
</head>
<body>
	@extends('layouts.app_top') @section('content')
	<h3 class="title">新規登録確認</h3>
	<div class="user-register">
		<form method="POST" action="{{ route('user.register.store') }}" autocomplete="off">
		<!-- CSRF保護 -->
			@csrf

            <!-- エラーメッセージ -->
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif

			<!-- 入力フォーム -->
			<table>
				<tr>
					<th>ユーザー名:</th>
					<td>
						<input class="input" type="text" name="user_name" value="{{ $user_name }}">
					</td>
				</tr>
				<tr>
					<th>PW:</th>
					<td>
						<input class="input" type="text" name="pass" value="{{ $pass }}">
					</td>
				</tr>
				<tr>
					<th>PW確認:</th>
					<td>
						<input class="input" type="text" name="pass_conf" value="{{ $pass_conf }}">
					</td>
				</tr>
				<tr>
					<th>管理者:</th>

        			@if ($admin_check == 1)

        				<td>あり</td>
        				<input type="hidden" name="admin_check" value="1">

        			@else

        				<td>なし</td>
        				<input type="hidden" name="admin_check" value="0">

        			@endif

				</tr>
			</table>

			<div class="button">
    			<button type="submit">登録</button>
			</div>
		</form>

		<form action="{{ route('user.register.create') }}">
			<button type="submit">戻る</button>
		</form>
	</div>
	@endsection
</body>
