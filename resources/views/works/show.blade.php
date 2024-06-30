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
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card mt-3">
                  <div class="card-header">
                      <h5>目標：{{ $work->title }}</h5>
                  </div>
                  <div class="card-body">
                  <p class="card-text">詳細：{{ $work->contents }}</p>
                  <p>投稿日時：{{ $work->created_at }}</p>
                  <a href="{{ route('works.edit' , $work->id) }}" class="btn btn-primary">編集する</a>
                  <form action='{{ route('works.destroy' , $work->id) }}' method='post'>
                    @csrf
                    @method('delete')
                      <input type='submit' value='削除' class="btn btn-danger" onclick='return confirm("本当に削除しますか？");'>
                  </form>
                  </div>
              </div>
          </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8">
                <button type="button" class="btn btn-primary" onclick="window.location='{{ route('comments.create', $work->id) }}'">コメントする</button>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
          @foreach($work->comments as $comment)
          コメント一覧
            <div class="card mt-3">
                <h5 class="card-header">投稿者：{{ $comment->user->name }}</h5>
                <div class="card-body">
                    <h5 class="card-title">投稿日時：{{ $comment->created_at }}</h5>
                    <p class="card-text">詳細：{{ $comment->contents }}</p>
                </div>
            </div>
            @endforeach
        </div>
      </div>
  </div>
  <footer>
    Copyright &copy; Seedkun Inc.
  </footer>
  @endsection

