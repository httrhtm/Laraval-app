<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
<script src="{{ asset('js/form.js') }}"></script>

</head>
<body>
	@extends('layouts.app_top')
	@section('content')
	<h3 class="title">編集</h3>

	<div class="edit">

		<form method="POST" action="{{ route('edit.confirm') }}" autocomplete="off">
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
    		<table class="question-tbl">
    			<tr>
    				<th>問題:</th>

    				<!-- 問題 -->
    				<td class="textbox">
<<<<<<< HEAD
    					<input class="input" type="text" name="question" value="{{ $question }}">
    					<input type="hidden" name="question_id" value="{{ $id }}">
=======
    					<input type="text" name="question" value="{{ $question }}">
    					<input type="hidden" name="question_id" value="{{ $question_id }}">
>>>>>>> 041c2922048321919e0069da6548daf3f9b04afb
    				</td>
    			</tr>
    		</table>

    		<!-- 答え -->
    		@foreach ($answers as $answer)
        		<table>
        			<tr>
        				<th>答え:</th>
        				<td class="textbox">
<<<<<<< HEAD
        					<input class="input" type="text" name="answers[]" value="{{ $answer['answer'] }}">
        					<input type="hidden" name="answer_id[]" value="{{ $answer['id'] }}">
=======
        					<input type="text" name="answers[]" value="{{ $answer['answer'] }}">
        					<input type="hidden" name="answer_ids[]" value="{{ $answer['id'] }}">
>>>>>>> 041c2922048321919e0069da6548daf3f9b04afb
        				</td>
    			</tr>
        		</table>
    		@endforeach
    			<table id="answer-tbl"></table>

    		<div class="button">
    			<input type="button" value="追加" onclick="addTableRow();">
    			<button type="submit">確認</button>
			</div>
		</form>

		<form action="{{ route('list') }}">
			<button type="submit">戻る</button>
		</form>
	</div>
	@endsection
</body>
</html>