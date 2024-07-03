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
<div class="row justify-content-center">
  <div class="col-md-8 ">
          <a href="{{ route('works.index') }}" class="m-1" style="font-size: 17px; color:black">← 一覧に戻る</a>
  </div>
</div>
<div class="tw-flex tw-flex-col tw-items-center">
  <div class=" tw-rounded-full tw-overflow-hidden tw-border border-solid tw-w-[150px] tw-h-[150px] tw-bg-white tw-text-center"   >
    @if($work->image_at)
        <img src="{{ asset($work->image_at) }}" alt="投稿画像" class="tw-w-full tw-h-auto">
    @endif
</div>
    <div class="tw-mt-4">
        <div class=" tw-text-left tw-bg-black-100 tw-mb-50 " style="font-size: 25px">投稿者：{{ $work->user->name }}</div>
    </div> 
</div>
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="mt-3">
                  <div class=""style="">
                      <div class="tw-mb-3 tw-mt-8">
                          <h5 class="tw-text-center" style="font-size: 30px">{{  $work->pulldown }}の目標</h5>
                      </div>
                      <h5 class="tw-text-center " style="font-size: 30px">「　{{ $work->title }}　」</h5>
                  </div>
                  <div class="">
                    <div class="tw-mt-5">
                        <p class="tw-text-left" style="font-size: 28px">詳細</p>
                    </div>
                  <p class="tw-text-justify" style="font-size: 25px">{!! nl2br(htmlspecialchars($work->contents)) !!}</p>
                  <p class="tw-text-right" style="font-size: 15px">投稿日時：{{ substr($work->created_at, 0, 10) }}</p>
              <div class="tw-flex tw-items-center tw-justify-end">
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
                <h5 class="tw-bg-red-100 card-header" style="font-size: 17px">コメント者：{{ $comment->user->name }}</h5>
                <div class="tw-bg-blue-100 card-body">
                      <div class="tw-flex tw-items-center">
                  {{-- <div class="tw-lg:mb-0 tw-rounded-full tw-overflow-hidden tw-border border-solid tw-w-[70px] tw-h-[70px] tw-bg-white tw-mr-10 tw-ml-2"   > --}}
                    @if($work->image_at)
                        <img src="{{ asset($work->image_at) }}" alt="投稿画像" class="tw-w-[70px] tw-h-[70px] tw-rounded-full tw-mr-5">
                    @endif
                {{-- </div> --}}
                      <div class="" style="font-size: 20px">
                    <p class="card-text">詳細：{{ $comment->contents }}</p>
                    <h5 class="card-title">投稿日時：{{ substr($comment->created_at, 0, 10) }}</h5>
                      </div>
                </div>
                      </div>
          <div class="tw-flex tw-items-center tw-justify-end tw-bg-blue-100">
                @can('commentator', $comment)
                <div class="" style="tw-mr-5">
                <form action='{{ route('comments.destroy' , $comment) }}' method='post'>
                  @csrf
                  @method('delete')
                <div class="tw-bg-blue-100 ">
                    <input type='submit' value='削除  ' class="delete " onclick='return confirm("本当に削除しますか？");' style="">
                  </div>
                </form>
              </div>

                {{-- //// --}}
                {{-- <form action='{{ route('works.destroy' , $work) }}' method='post'>
                  @csrf
                  @method('delete')
                    <input type='submit' value='削除' class="delete" onclick='return confirm("本当に削除しますか？");'>
                  </form> --}}
                  {{-- /// --}}
                @endcan
          </div>
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