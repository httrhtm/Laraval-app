<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
</head>
<body>
	@extends('layouts.app_top')
	@section('content')
	<h3 class="title">編集確認</h3>

	<div class="condirm">

		<form method="POST" action="{{ route('edit.update') }}" autocomplete="off">
		<!-- CSRF保護 -->
		@csrf
    		<table class="question-tbl">
    			<tr>
    				<th>問題:</th>

    				<!-- 問題 -->
    				<td class="textbox">
    					<input readonly type="text" value="{{ $question }}">
    					<input type="hidden" name="question_id" value="{{ $question_id }}">
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
        					<input  readonly type="text" name="answer[]" value="{{ $answer }}">
        				</td>
        			</tr>
        		</table>
        		@endforeach
        		@foreach ($answer_ids as $answer_id)
        			<input type="hidden" name="answer_id"  value="{{ $answer_id }}">
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
    			<button type="submit">更新</button>
    		</div>
		</form>

		<form action="{{ route('list') }}">
			<button type="submit">戻る</button>
		</form>
	</div>
	@endsection
</body>
</html>