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
                <button type="button" class="btn btn-primary" onclick="window.location='{{ route('comments.create', $work->id) }}'">コメントする</button>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
          <div class="tw-text-lg" style="font-size: 20px">コメント一覧</div>
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
  <div class="card-body">
    <div class="tw-container tw-mx-auto tw-flex tw-flex-wrap tw-justify-center">
      <div class="tw-lg:w-1/5 tw-w-full tw-mb-10 tw-lg:mb-0 tw-rounded-lg tw-overflow-hidden">
      </div>
      <div class="tw-flex tw-flex-col tw-flex-wrap tw-lg:py-6 tw-mb-10 tw-lg:w-1/2 tw-lg:pl-12 tw-lg:text-left tw-text-center">
        <div class="flex flex-col mb-10  items-center">
          <div class="tw-w-12 tw-h-12 tw-inline-flex tw-items-center tw-justify-center tw-rounded-full tw-bg-indigo-100 tw-text-indigo-500 tw-mb-5">
            <div class="tw-lg:mb-0 tw-rounded-full tw-overflow-hidden tw-border border-solid tw-w-[70px] tw-h-[70px] tw-bg-white "   >
              @if($work->image_at)
                  <img src="{{ asset($work->image_at) }}" alt="投稿画像" class="tw-w-full tw-h-auto">
              @endif
          </div>
          </div>
          <div class="tw-flex tw-justify-center tw-items-center tw-flex-col">
            <h2 class="tw-text-gray-900 tw-text-lg tw-title-font tw-font-medium tw-mb-3">目標: {{  $work->title}} </h2>
            <p class="tw-leading-relaxed tw-text-base">{{ $work->contents }}</p>

            <h6 class="tw-text-red-900 tw-text-sm tw-title-font tw-font-medium tw-mb-1">投稿者: {{ $work->user->name }}</h6>
            <div class="card-header tw-text-left tw-bg-red-100" style="font-size: 15px">
              {{ $work->user->name }}
          </div>

            <h6 class="tw-text-red-900 tw-text-sm tw-title-font tw-font-small tw-mb-1">投稿日時 : {{ $work->created_at }}</h6>
            <a href="{{ route('works.show', $work->id) }}" class="tw-mt-3 tw-text-indigo-500 tw-inline-flex tw-items-center">詳細へ
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="tw-w-4 tw-h-4 tw-ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- //////////////// --}}
  <footer>
    Copyright &copy; Seedkun Inc.
  </footer>
  @endsection
  {{-- <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto flex flex-wrap">
      <div class="lg:w-1/2 w-full mb-10 lg:mb-0 rounded-lg overflow-hidden">
        <img alt="feature" class="object-cover object-center h-full w-full" src="https://dummyimage.com/460x500">
      </div>
      <div class="flex flex-col flex-wrap lg:py-6 -mb-10 lg:w-1/2 lg:pl-12 lg:text-left text-center">
        <div class="flex flex-col mb-10 lg:items-start items-center">
          <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
              <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
            </svg>
          </div>
          <div class="flex-grow">
            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Shooting Stars</h2>
            <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine.</p>
            <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
        </div>
        <div class="flex flex-col mb-10 lg:items-start items-center">
          <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
              <circle cx="6" cy="6" r="3"></circle>
              <circle cx="6" cy="18" r="3"></circle>
              <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
            </svg>
          </div>
          <div class="flex-grow">
            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">The Catalyzer</h2>
            <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine.</p>
            <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
        </div>
        <div class="flex flex-col mb-10 lg:items-start items-center">
          <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
              <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
              <circle cx="12" cy="7" r="4"></circle>
            </svg>
          </div>
          <div class="flex-grow">
            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Neptune</h2>
            <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine.</p>
            <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section> --}}

