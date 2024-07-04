@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="container-box row justify-content-center tw-ml-40">
    <div class="form-group tw-mb-3">
      <form action="{{ route('works.index') }}" method="get" class="tw-flex tw-items-center">
        <select name="pulldown" id="pulldown" placeholder="〜月" style="width:120px; font-size:18px; border:solid 1px">
            <option value="目標一覧" >目標一覧</option>
            <option value="マイページ" >マイページ</option>
            <option value="1" >1月</option>
            <option value="2" >2月</option>
            <option value="3" >3月</option>
            <option value="4" >4月</option>
            <option value="5" >5月</option>
            <option value="6" >6月</option>
            <option value="7" >7月</option>
            <option value="8" >8月</option>
            <option value="9" >9月</option>
            <option value="10">10月</option>
            <option value="11">11月</option>
            <option value="12">12月</option>
        </select>
        <button class="search" style=" border:solid; margin-left:10px;  padding:3px; border-radius:5px; font-size:15px; " type="submit">
        <img style="width:30px; " src="{{ asset('images/1720018483.jpg') }}" alt=""></button>
      </form>
  </div>
      <div class="col-md-10 work-list">
          <div class="card text-center">
            <div class="card-header tw-text-center tw-bg-red-100 " style="font-size: 22px">
                目標一覧
            </div>
              @foreach($works as $work)
              <div class="card-header tw-text-left tw-bg-red-100" style="font-size: 18px">
                {{ $work->user->name }}
            </div>
              <div class="card-body tw-bg-blue-100" style="padding: 4px">
                  <div class="tw-container tw-mx-auto tw-flex tw-flex-wrap tw-justify-center tw-items-center ">
                      <div class="tw-lg:mb-0 tw-rounded-full tw-overflow-hidden tw-border border-solid tw-w-[70px] tw-h-[70px] tw-bg-white "   >
                          @if($work->image_at)
                              <img src="{{ asset($work->image_at) }}" alt="投稿画像" class="tw-w-full tw-h-auto">
                          @endif
                      </div>
                      <div class="mokuhyou-box tw-flex tw-flex-col tw-flex-wrap tw-lg:py-6 tw-mb-4 tw-lg:w-1/2 tw-lg:pl-12 tw-lg:text-left tw-border border-solid  tw-w-[800px] tw-justify-center">
                          <div class="flex flex-col mb-10 items-center tw-text-left tw-pl-10">
                              <div class="tw-flex tw-justify-center tw-flex-col ">
                                  <h2 class="tw-text-gray-900 tw-title-font tw-font-medium tw-mt-2 " style="font-size: 18px">{{  $work->pulldown }}月の目標<div style="font-size: 21p; margin-top:5px;">「 {{ $work->title }} 」</div></h2>
                                  <h2 class="tw-text-gray-900 tw-title-font tw-font-medium tw-mt-2 " style="font-size: 18px">詳細<div style="font-size: 17px">{!! nl2br(htmlspecialchars($work->contents)) !!} </div></h2>
                                  <h1 class="tw-text-black-900 tw-title-font tw-font-medium " style="font-size: 20px"></h1>             
                              </div>
                          </div>
                      </div>
                      <div class="tw-flex tw-items-center tw-w-full tw-justify-end tw-gap-3">
                        <p class="tw-leading-relaxed tw-text-base " style="font-size: 16px">投稿日時 : {{ substr($work->created_at, 0, 10) }}</p>
                        @can('poster', $work)
                        <form action='{{ route('works.destroy' , $work) }}' method='post' class="">
                          @csrf
                          @method('delete')
                            <input type='submit' value='削除' class="delete " onclick='return confirm("本当に削除しますか？");'>
                          </form>
                          @endcan 
                        <a href="{{ route('works.show', $work->id) }}" class="show tw-text-indigo-500 tw-inline-flex tw-items-center" style="font-size: 20px">詳細
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="tw-w-4 tw-h-4 tw-ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                      </div>
                  </div>
              </div>
              @endforeach
          </div>
      </div>
      <div class="col-md-2" >
        <a href="{{ route('works.create') }}" class="btn btn-primary tw-mb-2">
          新規投稿
        </a>
      </div>
  </div>
</div>
<footer>
  Copyright &copy; Softball Club.
</footer>
  {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html> --}}
@endsection