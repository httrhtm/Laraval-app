<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
</head>
<body>
	@extends('layouts.app_top') @section('content')
	<h3 class="title">新規登録確認</h3>
	<div class="register">
		<form method="POST" action="{{ route('register.store') }}" autocomplete="off">
		<!-- CSRF保護 -->
		@csrf
			<!-- 問題 -->
			<table class="question-tbl">
				<tr>
					<th>問題:</th>
					<td class="textbox">
						<input type="text" name="question" value="{{ $question }}">
					</td>

				</tr>
			</table>

			<!-- 答え -->
			@foreach($answers as $answer)
			<table>
				<tr>
					<th>答え:</th>
					<td class="textbox">
						<input type="text" name="answers[]" value="{{ $answer }}">
					</td>
				</tr>
			</table>
			@endforeach

			<div class="button">
    			<button type="submit">登録</button>
			</div>
		</form>

		<form action="{{ route('register.create') }}">
			<button type="submit">戻る</button>
		</form>
	</div>
	@endsection
</body>
</html>