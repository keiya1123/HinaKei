@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('works.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>目標</label>
                    <input type="text" class="form-control" placeholder="タイトルを入力して下さい" name="title" id="title">
                </div>
                <div class="form-group">
                    <label>詳細</label>
                    <textarea class="form-control" placeholder="アンパンマン" rows="10" name="contents" id="contents"></textarea>
                </div>
                <div class="form-group">
                    <label>画像</label>
                    <input type="file" class="form-control" name="image_at" id="image_at">
                </div>
                <button type="submit" class="btn btn-primary" onclick="return checkdata()">作成</button>
            </form>
        </div>
    </div>
</div>
<footer>
    Copyright &copy; Seedkun Inc.
</footer>

  <script>
    function checkdata()
    {
        const title = document.getElementById('title').value.replace(/\s/g, '');
        const contents = document.getElementById('contents').value.replace(/\s/g, '');

        if(title.length == 0 && contents.length == 0) {
            alert("目標と詳細が未入力です");
            return false;
        }

        if(title.length == 0) {
            alert("目標が未入力です");
            return false;
        }

        if(contents.length == 0) {
            alert("詳細が未入力です");
            return false;
        }

        return true;
    }
</script>
  @endsection

