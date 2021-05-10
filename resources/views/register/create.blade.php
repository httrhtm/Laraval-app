<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
<script src="{{ asset('js/form.js') }}"></script>
</head>
<body>
	@extends('layouts.app_top') @section('content')
	<h3 class="title">新規登録</h3>
	<div class="register">
		<form method="POST" action="{{ route('register.confirm') }}" autocomplete="off">
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
			<!-- 問題 -->
			<table class="question-tbl">
				<tr>
					<th>問題:</th>
					<td class="textbox">
						<input class="input" type="text" name="question">
					</td>

				</tr>
			</table>

			<!-- 答え -->
			<table id="answer-tbl">
				<tr>
					<th>答え:</th>
					<td class="textbox">
						<input class="input" type="text" name="answers[]">
					</td>
				</tr>
			</table>

			<div class="button">
    			<input type="button" value="追加" onclick="addTableRow();">
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