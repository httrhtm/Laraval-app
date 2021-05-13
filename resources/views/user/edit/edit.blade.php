<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
<script src="{{ asset('js/form.js') }}"></script>
</head>
<body>
	@extends('layouts.app_top') @section('content')
	<h3 class="title">編集</h3>
	<div class="user">
		<form method="POST" action="{{ route('user.edit.confirm') }}" autocomplete="off">
		<!-- CSRF保護 -->
			@csrf

			<!-- 入力フォーム -->
			<table>
				<tr>
					<th>ID:</th>
					<td>
						<input class="input" type="text" name="user_id" value="{{ $user_id }}">
					</td>
				</tr>
				<tr>
					<th>ユーザー名:</th>
					<td>
						<input readonly class="input" type="text" value="{{ $user_name }}">
					</td>
				</tr>
				<tr>
					<th>PW:</th>
					<td>
						<input class="input" type="password" value="{{ $password }}">
					</td>
				</tr>
				<tr>
					<th>PW確認:</th>
					<td>
						<input class="input" type="password" value="{{ $password }}">
					</td>
				</tr>
				<tr>
					<th>管理者:</th>

        			@if ($admin_check == 1)

        				<td>
        					<input type="hidden" name="admin_check" value="0">
        					<input type="checkbox" name="admin_check" value="1" checked="checked">
        				</td>

        			@else

        				<td>
        					<input type="hidden" name="admin_check" value="0">
        					<input type="checkbox" name="admin_check" value="1">
        				</td>

        			@endif

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
