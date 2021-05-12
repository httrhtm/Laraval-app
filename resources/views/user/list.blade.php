<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<link href="{{ asset('css/user.css') }}" rel="stylesheet">
</head>
<body>
@extends('layouts.app_top')
@section('content')
<div class="register">
	<a href="">新規登録</a>
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
					<button type="submit">編集</button>
				</form>
			</td>

			<td lass="btn">
				<!-- 削除ボタン -->
				<form action="" method="post">
					<button type="submit">削除</button>
				</form>
			</td>

		</tr>
		@endforeach
	</table>
</div>
@endsection
</body>
</html>