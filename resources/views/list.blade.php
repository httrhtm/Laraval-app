<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<link href="{{ asset('css/list.css') }}" rel="stylesheet">
</head>
<body>
@extends('layouts.app_top')
@section('content')
<div class="register">
	<a href="{{ route('register.create') }}">新規登録</a>
</div>

<div class="list">
	@foreach ($questions as $question)
		<table class="question-tbl">
			<tr>
				<th>問題:</th>

				<!-- 問題番号 -->
				<td>{{ $question->id }}</td>

				<!-- 問題 -->
				<td class="textbox">{{ $question->question }}</td>

				<!-- 編集ボタン -->
				<td>
					<form action="{{ route('edit.edit') }}" method="post">
					<!-- CSRF保護 -->
					@csrf
						<button type="submit">編集</button>
						<input type="hidden" name="id" value="{{ $question->id }}">
						<input type="hidden" name="question" value="{{ $question->question }}">
					</form>
				</td>

				<!-- 削除ボタン -->
				<td>
					<form action="{{ route('delete.confirm') }}" method="post">
					<!-- CSRF保護 -->
					@csrf
						<button type="submit">削除</button>
						<input type="hidden" name="id" value="{{ $question->id }}">
						<input type="hidden" name="question" value="{{ $question->question }}">
					</form>
				</td>

			</tr>
		</table>

        <!-- 答え -->
		@foreach ($answers as $answer)
			@if ($answer->questions_id == $question->id)
    		<table>
    			<tr>
    				<th>答え:</th>
    				<td class="textbox">{{ $answer->answer }}</td>
    			</tr>
    		</table>
			@endif
		@endforeach
	@endforeach
</div>
@endsection
</body>
</html>