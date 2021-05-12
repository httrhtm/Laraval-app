<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<link href="{{ asset('css/user.css') }}" rel="stylesheet">
</head>
<body>
@extends('layouts.app_top')
@section('content')
<div class="register">
	<a href="{{ route('user.register.create') }}">新規登録</a>
</div>
<div class="list">
	<table>
		<tr>
			<th>ID</th>
			<th>権限</th>
			<th>ユーザー名</th>
		</tr>

		@foreach ($users as $user)
		<tr>
			<!-- ID -->
			<td class="box id">{{ $user['id'] }}</td>

			<!-- 権限 -->
			@if (($user['admin_flag'] == 1))

				<td class="box admin">管理者</td>

			@else

				<td class="box admin">一般</td>

			@endif

			<!-- ユーザー名 -->
			<td class="box username">{{ $user['name'] }}</td>

			<td lass="btn">
				<!-- 編集ボタン -->
				<form action="" method="post">
    				<!-- CSRF保護 -->
    				@csrf
					<button type="submit">編集</button>
					<input type="hidden" name="user_id" value="{{ $user['id'] }}">
					<input type="hidden" name="admin_flag" value="{{ $user['admin_flag'] }}">
					<input type="hidden" name="user_name" value="{{ $user['name'] }}">
				</form>
			</td>

			<td lass="btn">
				<!-- 削除ボタン -->
				<form action="{{ route('user.delete.confirm') }}" method="post">
				    <!-- CSRF保護 -->
					@csrf
					<button type="submit">削除</button>
					<input type="hidden" name="user_id" value="{{ $user['id'] }}">
					<input type="hidden" name="admin_flag" value="{{ $user['admin_flag'] }}">
					<input type="hidden" name="user_name" value="{{ $user['name'] }}">
				</form>
			</td>

		</tr>
		@endforeach
	</table>
</div>
@endsection
</body>
</html>