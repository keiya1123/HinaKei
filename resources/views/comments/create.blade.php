@extends('layouts.app')
@section('content')
<div class="container">
      
  <div class="row justify-content-center mt-5">
      <div class="col-md-8">
        <h2>以下の目標にコメントします</h2>
          <div class="card mt-3">
              <div class="card-header tw-bg-red-100">
                  <h5>投稿者：{{ $work->id }}</h5>
              </div>
              <div class="card-body tw-bg-blue-100">
            <h5>目標：{{ $work->title }}</h5>
              <p class="card-text">詳細：{{ $work->contents }}</p>
              <p>投稿日時：{{ substr($work->created_at, 0, 10) }}</p>
              
              </div>
          </div>
      </div>
  </div>
  <div class="col-md-8 tw-text-right">
    <a href="{{ route('works.index') }}" class="btn btn-danger m-1">一覧に戻る</a>
</div>
{{-- <div class="col-md-8 tw-text-right">
    <a href="{{ route('works.show') }}" class="btn btn-danger m-1">前に戻る</a>
</div> --}}
  <div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <form action="{{ route('comments.store') }}" method="post">
            @csrf
            <input type="hidden" name="work_id" value="{{ $work->id }}">
            <div class="form-group">
                <label>コメント</label>
                <textarea class="form-control" 
                placeholder="内容" rows="5" name="contents"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">コメントする</button>
        </form>
    </div>
  </div>
</div>
@endsection