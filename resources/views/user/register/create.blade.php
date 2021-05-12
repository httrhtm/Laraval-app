<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
<script src="{{ asset('js/form.js') }}"></script>
</head>
<body>
	@extends('layouts.app_top') @section('content')
	<h3 class="title">新規登録</h3>
	<div class="user-register">
		<form method="POST" action="{{ route('user.register.confirm') }}" autocomplete="off">
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
						<input class="input" type="text" name="user_name">
					</td>
				</tr>
				<tr>
					<th>PW:</th>
					<td>
						<input class="input" type="text" name="pass">
					</td>
				</tr>
				<tr>
					<th>PW確認:</th>
					<td>
						<input class="input" type="text" name="pass_conf">
					</td>
				</tr>
				<tr>
					<th>管理者:</th>
					<td>
						<input type="hidden" name="admin_check" value="0">
						<input type="checkbox" name="admin_check" value="1">
					</td>
				</tr>
			</table>

			<div class="button">
    			<button type="submit">確認</button>
			</div>
		</form>

		<form action="{{ route('user.list') }}">
			<button type="submit">戻る</button>
		</form>
	</div>
	@endsection
</body>
</html>