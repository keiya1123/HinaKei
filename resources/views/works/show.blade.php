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
<div class="tw-flex tw-flex-col tw-items-center">
  <div class=" tw-rounded-full tw-overflow-hidden tw-border border-solid tw-w-[150px] tw-h-[150px] tw-bg-white tw-text-center"   >
    @if($work->image_at)
        <img src="{{ asset($work->image_at) }}" alt="投稿画像" class="tw-w-full tw-h-auto">
    @endif
</div>
    <div class="">
        <div class=" tw-text-left tw-bg-black-100 tw-mb-50 " style="font-size: 20px">投稿者：{{ $work->user->name }}</div>
    </div> 
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="mt-3">
                  <div class=""style="font-size: 40px">
                      <h5 class="tw-text-center">目標：{{ $work->title }}</h5>
                  </div>
                  <div class="">
                  <p class="tw-text-center tw-text-2xl">詳細：{{ $work->contents }}</p>
                  <p class="tw-text-right">投稿日時：{{ substr($work->created_at, 0, 10) }}</p>

                  @can('poster', $work)
                  <a href="{{ route('works.edit' , $work->id) }}" class="btn btn-primary">編集する</a>
                  {{-- <form action='{{ route('works.destroy' , $work->id) }}' method='post'> --}}
                    <form action='{{ route('works.destroy' , $work) }}' method='post'>
                    @csrf
                    @method('delete')
                      <input type='submit' value='削除' class="btn btn-danger" onclick='return confirm("本当に削除しますか？");'>
                    </form>
                  @endcan
                  </div>
              </div>
          </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8">
                <a href="{{ route('works.index') }}" class="btn btn-danger m-1">一覧に戻る</a>
        </div>
      
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
          <div style="display: flex; align-items: center;">
            <div class="tw-text-lg" style="font-size: 20px">コメント一覧</div>
            <div style="margin-left: 10px">
            <button type="button" class="btn btn-primary" onclick="window.location='{{ route('comments.create', $work->id) }}'">コメントする</button>
            </div>
        </div>
        @foreach($work->comments as $comment)
            <div class="card mt-3">
                <h5 class="tw-bg-red-100 card-header">コメント者：{{ $comment->user->name }}</h5>
                <div class="tw-bg-blue-100 card-body">
                    <h5 class="card-title">投稿日時：{{ substr($comment->created_at, 0, 10) }}</h5>
                    <p class="card-text">詳細：{{ $comment->contents }}</p>
                </div>
                @can('commentator', $comment)
                <form action='{{ route('comments.destroy' , $comment) }}' method='post'>
                  @csrf
                  @method('delete')
                <div class="tw-bg-blue-100">
                    <input type='submit' value='削除' class="btn btn-danger " onclick='return confirm("本当に削除しますか？");'>
                  </div>
                </form>
                @endcan
            </div>
            @endforeach
        </div>
      </div>
  </div>
  {{-- ///////////// --}}
 
  <footer class="tw-w-full ">
    Copyright &copy; Softball Club.
  </footer>
  @endsection