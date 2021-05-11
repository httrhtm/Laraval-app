<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<link href="{{ asset('css/history.css') }}" rel="stylesheet">
</head>
<body>
@extends('layouts.app_top')
@section('content')
<div class="history">
	<h3 class="title">履歴</h3>

		<table border = 1>
			<tr>
				<th>氏名</th>
				<th>得点</th>
				<th>採点時間</th>
			</tr>

			@foreach ($history as $h)
			<tr>
				<td>{{ $user_name }}</td>
				<td>{{ $h->point }}</td>
				<td>{{ $h->created_at }}</td>
			</tr>
			@endforeach
		</tabel>

</div>
@endsection
</body>
</html