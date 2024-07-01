@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card text-center">
              <div class="card-header tw-bg-green-100 tw-text-2xl">
                  投稿一覧
              </div>
              @foreach($works as $work)
              <div class="card-body tw-bg-blue-100">
                  <div class="tw-container tw-mx-auto tw-flex tw-flex-wrap tw-justify-center">
                      <div class=" tw-mb-10 tw-lg:mb-0 tw-rounded-full tw-overflow-hidden tw-border border-solid tw-bg-green-100 tw-w-[100px] tw-h-[100px] "  >
                          @if($work->image_at)
                              <img src="{{ asset($work->image_at) }}" alt="投稿画像" class="tw-w-full tw-h-auto">
                          @endif
                      </div>
                      <div class="tw-flex tw-flex-col tw-flex-wrap tw-lg:py-6 tw-mb-10 tw-lg:w-1/2 tw-lg:pl-12 tw-lg:text-left tw-text-center tw-border border-solid tw-bg-red-100">
                          <div class="flex flex-col mb-10 items-center">
                              <div class="tw-flex tw-justify-center tw-items-center tw-flex-col">
                                  <h2 class="tw-text-gray-900 tw-text-5xl tw-title-font tw-font-medium tw-mb-3">目標： {{ $work->title }} </h2>
                                  <p class="tw-leading-relaxed tw-text-base tw-text-2xl">詳細：{{ $work->contents }}</p>
                                  <h1 class="tw-text-black-900 tw-text-2xl tw-title-font tw-font-medium tw-mb-1">ユーザー： {{ $work->user->name }}</h1>
                                  <a href="{{ route('works.show', $work->id) }}" class="tw-mt-3 tw-text-indigo-500 tw-inline-flex tw-items-center tw-text-2xl">詳細
                                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="tw-w-4 tw-h-4 tw-ml-2" viewBox="0 0 24 24">
                                          <path d="M5 12h14M12 5l7 7-7 7"></path>
                                      </svg>
                                  </a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="card-footer tw-text-2xl tw-bg-green-100">
                  投稿日時 : {{ $work->created_at }}
              </div>
              @endforeach
              
          </div>
      </div>
      <div class="col-md-2 " >
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