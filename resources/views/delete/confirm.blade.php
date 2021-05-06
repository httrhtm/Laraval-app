<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
</head>
<body>
	@extends('layouts.app_top')
	@section('content')
	<h3 class="title">削除確認</h3>

	<div class="condirm">

		<form method="POST" action="{{ route('delete.destroy') }}" autocomplete="off">
		<!-- CSRF保護 -->
		@csrf
    		<table class="question-tbl">
    			<tr>
    				<th>問題:</th>

    				<!-- 問題 -->
    				<td class="textbox">
    					<input type="text" value="{{ $question }}">
    					<input type="hidden" name="question_id" value="{{ $id }}">
    				</td>
    			</tr>
    		</table>

    		<!-- 答え -->
    		@if (is_array($answers))
        		@foreach ($answers as $answer)
        		<table>
        			<tr>
        				<th>答え:</th>
        				<td class="textbox">
        					<input type="text" value="{{ $answer['answer'] }}">
        					<input type="hidden" name="answer_id[]" value="{{ $answer['id'] }}">
        				</td>
        			</tr>
        		</table>
        		@endforeach
    		@else
    			<table>
        			<tr>
        				<th>答え:</th>
        				<td class="textbox">
        					<input type="text" name="answer" value="{{ $answers }}">
        				</td>
        			</tr>
        		</table>
			@endif
    		<div class="button">
    			<button type="submit">削除</button>
    		</div>
		</form>

		<form action="{{ route('list') }}">
			<button type="submit">戻る</button>
		</form>
	</div>
	@endsection
</body>
</html>