@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">TOP</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h2>ようこそ、{{ Auth::user()->name }}さん！</h2>

                    You are logged in!
                </div>

                <div class="top-menue">

					<form action="list.php" method="post">
						<button type="submit">問題と答えを確認・登録する ＞</button>
					</form>

					<form action="test.php" method="post">
						<button type="submit">テストをする ＞</button>
					</form>

					<form action="history.php" method="post">
						<button type="submit">過去の採点結果をみる ＞</button>
					</form>

				</div>
            </div>
        </div>
    </div>
</div>
@endsection
