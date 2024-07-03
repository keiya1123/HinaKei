@extends('layouts.app')
@section('content')
<div class="container">
      
<div class="col-md-8 tw-row-justify-content-center">
    <a href="{{ route('works.index') }}" class="m-1" style="font-size: 17px; color:black">←　一覧に戻る</a>
</div>
<div class="col-md-8 tw-row-justify-content-center">
  <a href="{{ route('works.show', $work->id) }}" class="m-1" style="font-size: 17px; color:black">←　詳細に戻る</a>
</div>

  <div class="row justify-content-center mt-5">
      <div class="col-md-8">
        <h2 style="font-size: 17px">以下の目標にコメントします</h2>
          <div class="card mt-3">
              <div class="card-header tw-bg-red-100" style="font-size: 17px">
                  <h5>投稿者：{{ $work->id }}</h5>
              </div>
              <div class="card-body tw-bg-blue-100" style="font-size: 17px">

                @if($work->image_at)
                <img src="{{ asset($work->image_at) }}" alt="投稿画像" class="tw-w-[70px] tw-h-[70px] tw-rounded-full tw-mr-5">
            @endif
                <div class="">
              <h5>目標：{{ $work->title }}</h5>
              <p class="card-text">詳細：{{ $work->contents }}</p>
              <p>投稿日時：{{ substr($work->created_at, 0, 10) }}</p>
              </div>
              </div>
          </div>
      </div>
  </div>
{{-- <div class="col-md-8 tw-text-right">
    <a href="{{ route('works.show') }}" class="btn btn-danger m-1">前に戻る</a>
</div> --}}
  <div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <form action="{{ route('comments.store') }}" method="post">
            @csrf
            <input type="hidden" name="work_id" value="{{ $work->id }}" style="font-size: 17px">
            <div class="form-group">
                <label class="" style="font-size: 17px">コメント</label>
                <textarea class="form-control" 
                placeholder="内容" rows="5" name="contents"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">コメントする</button>
        </form>
    </div>
  </div>
</div>
@endsection