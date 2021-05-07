<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
</head>
<body>
	@extends('layouts.app_top') @section('content')
	<h3 class="title">新規登録</h3>
	<div class="register">
		<form method="POST" action="{{ route('register.confirm') }}" autocomplete="off">
		<!-- CSRF保護 -->
		@csrf

			<!-- 問題 -->
			<table class="question-tbl">
				<tr>
					<th>問題:</th>
					<td class="textbox">
						<input type="text" name="question" class="@error('question') is-invalid @enderror">
						@error('question')
							<div class="alert alert-danger">{{ $message }}</div>
						@enderror
					</td>

				</tr>
			</table>

			<!-- 答え -->
			<table>
				<tr>
					<th>答え:</th>
					<td class="textbox">
						<input type="text" name="answers[]" class="@error('answer') is-invalid @enderror">
						@error('answer')
							<div class="alert alert-danger">{{ $message }}</div>
						@enderror
					</td>
					<td class="remove">
						<button type="submit">削除</button>
					</td>
				</tr>
			</table>

			<!-- 答え -->
			<table>
				<tr>
					<th>答え:</th>
					<td class="textbox">
						<input type="text" name="answers[]" class="@error('answer') is-invalid @enderror">
						@error('answer')
							<div class="alert alert-danger">{{ $message }}</div>
						@enderror
					</td>
					<td class="remove">
						<button type="submit">削除</button>
					</td>
				</tr>
			</table>

			<div class="button">
    			<button type="button">追加</button>
    			<button type="submit">確認</button>
			</div>
		</form>

		<form action="{{ url('list') }}">
			<button type="submit">戻る</button>
		</form>
	</div>
	@endsection
</body>
</html>