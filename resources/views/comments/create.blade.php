@extends('layouts.app')
@section('content')
<div class="container">
      
  <div class="ichiran row justify-content-center tw-ml-20">
    <a href="{{ route('works.show', $work->id) }}" class="ichiran" style="font-size: 17px; color:black">← 詳細に戻る</a>
</div>

  <div class="row justify-content-center mt-5">
      <div class="col-md-8">
        <h2 style="font-size: 17px">以下の目標にコメントします</h2>
          <div class="card mt-3">
              <div class="card-header tw-bg-red-100 " style="font-size: 17px">
                  <h5>投稿者：{{ $work->user->name }}</h5>
              </div>
              <div class="card-body tw-bg-blue-100 tw-flex tw-items-center " style="font-size: 17px">
                  <div class="tw-mr-5">
                @if($work->image_at)
                <img src="{{ asset($work->image_at) }}" alt="投稿画像" class="tw-w-[70px] tw-h-[70px] tw-rounded-full tw-mr-5">
            @endif
                  </div>
                  <div class="">
                <div class="">
              <p>投稿日時：{{ substr($work->created_at, 0, 10) }}</p>
                </div>
                <div class="">
              <h5>目標：{{ $work->title }}</h5>
              <p class="card-text">詳細：{!! nl2br(htmlspecialchars($work->contents)) !!}</p>
                </div>
              </div>
            </div>
              </div>
          </div>
      </div>
  </div>

  <div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <form method="POST" action="{{ route('comments.store') }}">
          @csrf
          <input type="hidden" name="work_id" value="{{ $work->id }}" style="font-size: 17px">
          <div>
            <label class="" style="font-size: 17px">コメント</label>
          <textarea class="form-control" placeholder="内容" rows="5" id="contents" name="contents"></textarea>
        </div>
          <!-- 他の必要なフィールドを追加 -->
      
          <button type="submit" class="btn btn-danger mt-3" onclick="return checkdata1()">コメントする</button>
      </form>

    </div>
  </div>
</div>
{{-- @endsection --}}
<footer>
    Copyright &copy; Softball Club.
</footer>
 <script>
    function checkdata1() {
        const contents = document.getElementById('contents').value.trim();

        if (contents.length === 0) {
            alert("コメントが未入力です");
            return false;
        }
        return true;
    }
</script>

@endsection