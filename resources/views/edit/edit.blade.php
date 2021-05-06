<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
</head>
<body>
	@extends('layouts.app_top')
	@section('content')
	<h3 class="title">編集</h3>

	<div class="edit">

		<form method="POST" action="{{ route('edit.confirm') }}" autocomplete="off">
		<!-- CSRF保護 -->
		@csrf
    		<table class="question-tbl">
    			<tr>
    				<th>問題:</th>

    				<!-- 問題 -->
    				<td class="textbox">
    					<input type="text" name="question" value="{{ $question }}">
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
        					<input type="text" name="answer[]" value="{{ $answer['answer'] }}">
        					<input type="hidden" name="answer_id[]" value="{{ $answer['id'] }}">
        				</td>
    					<td class="remove">
    						<button type="submit">削除</button>
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
        				<td class="remove">
    						<button type="submit">削除</button>
    					</td>
        			</tr>
        		</table>
			@endif
    		<div class="button">
    			<button type="button">追加</button>
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