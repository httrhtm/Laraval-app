<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
<script src="{{ asset('js/form.js') }}"></script>
</head>
<body>
	@extends('layouts.app_top') @section('content')
	<h3 class="title">削除確認</h3>
	<div class="user-delete">
		<form method="POST" action="{{ route('user.delete.destroy') }}" autocomplete="off">
		<!-- CSRF保護 -->
			@csrf

			<!-- 入力フォーム -->
			<table>
				<tr>
					<th>ユーザー名:</th>
					<td>
						<input readonly class="input" type="text" value="{{ $user_name }}">
					</td>
				</tr>
				<tr>
					<th>PW:</th>
					<td>
						<input readonly class="input" type="password" value="{{ $password }}">
					</td>
				</tr>
				<tr>
					<th>PW確認:</th>
					<td>
						<input readonly class="input" type="password" value="{{ $password }}">
					</td>
				</tr>
				<tr>
					<th>管理者:</th>

        			@if ($admin_check == 1)

        				<td>あり</td>
        				<input type="hidden" value="1">

        			@else

        				<td>なし</td>
        				<input type="hidden" value="0">

        			@endif

				</tr>
			</table>

			<div class="button">
				<input class="input" type="hidden" name="user_id" value="{{ $user_id }}">
    			<button type="submit">削除</button>
			</div>
		</form>

		<form action="{{ route('user.list') }}">
			<button type="submit">戻る</button>
		</form>
	</div>
	@endsection
</body>
