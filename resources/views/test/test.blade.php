<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
</head>
<body>
@extends('layouts.app_top')
@section('content')
<div class="test">
	<h3 class="title">テスト</h3>
	<form method="POST" action="{{ route('test.result') }}" autocomplete="off">
	<!-- CSRF保護 -->
	@csrf
	@foreach ($questions as $question)
		<table class="question-tbl">
			<tr>
				<th>問題:</th>

				<!-- 問題番号 -->
				<td>
					{{ $question->id }}
					<input type="hidden" name="question_id[]" value="{{ $question->id }}">
				</td>

				<!-- 問題 -->
				<td class="textbox">{{ $question->question }}</td>
			</tr>
		</table>

        <!-- 回答 -->
		<table>
			<tr>
				<th>回答:</th>
				<td class="textbox">
					<input class="input" type="text" name="input[]">
				</td>
			</tr>
		</table>

	@endforeach

    	<!-- ボタン -->
    	<div class="button">
    		<button type="submit">採点</button>
    	</div>
	</form>
</div>
@endsection
</body>
</html>
