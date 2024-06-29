@extends('layouts.app')
@section('content')
<div class="container">
      
  <div class="row justify-content-center mt-5">
      <div class="col-md-8">
        <h2>以下の記事にコメントします</h2>
          <div class="card mt-3">
              <div class="card-header">
                  <h5>タイトル：{{ $work->title }}</h5>
              </div>
              <div class="card-body">
              <p class="card-text">内容：{{ $work->contents }}</p>
              <p>投稿日時：{{ $work->created_at }}</p>
              
              </div>
          </div>
      </div>
  </div>
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