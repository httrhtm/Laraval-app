<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<link href="{{ asset('css/list.css') }}" rel="stylesheet">
</head>
<body>
@extends('layouts.app_top')
@section('content')
<div class="register">
	<a href="">新規登録</a>
</div>

<div class="list">
	@foreach ($questions as $question)
		<table class="question-tbl">
			<tr>
				<th>問題:</th>

				<!-- 問題馬号 -->
				<td>{{ $question->id }}</td>

				<!-- 問題 -->
				<td class="textbox">{{ $question->question }}</td>

				<!-- 編集ボタン -->
				<td>
					<form action="edit.blade.php" method="post">
						<button type="submit">編集</button>
					</form>
				</td>

				<!-- 削除ボタン -->
				<td>
					<form action="delete_confirm.blade.php" method="post">
						<button type="submit">削除</button>
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