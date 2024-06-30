{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header></header>
    <main></main>
    <footer>
        <small>copy right &copy; HinaKei</small>
    </footer>
</body>
</html> --}}

@extends('layouts.app')

@section('content')
  <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
             <div class="card text-center">
            <div class="card-header">
                投稿一覧
            </div>
            @foreach($works as $work)
            <div class="card-body">
                <h5 class="card-title">目標 : {{ $work -> title}}</h5>
                <p class="card-text">
                  詳細 : {{ $work -> contents }}
                </p>
                <p class="card-text">投稿者：{{ $work->user->name }}</p>
                <a href="{{ route('works.show' , $work->id ) }}" class="btn btn-primary">詳細へ</a>
            </div>
            <div class="card-footer text-muted">
                投稿日時 : {{ $work -> created_at }}
            </div>
            @endforeach
        </div>
        </div>
        <div class="col-md-2">
          <a href="{{ route('works.create') }}" class="btn btn-primary">
            新規投稿
          </a>
        </div>
    </div>
  </div>
  <footer>
    Copyright &copy; Seedkun Inc.
  </footer>
  {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html> --}}
@endsection