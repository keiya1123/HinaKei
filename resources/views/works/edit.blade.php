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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('works.update', $work->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label>目標</label>
                    <input type="text" class="form-control" value="{{ $work->title }}" name="title" id="title">
                </div>
                <div class="form-group">
                    <label>詳細</label>
                    <textarea class="form-control" rows="5" name="contents" id="contents">{{ $work->contents }}</textarea>
                </div>
                <div class="form-group">
                    <label for="image_at">画像を選択してください</label>
                    <input type="file" class="form-control" name="image_at" id="image_at">
                </div>
                <button type="submit" class="btn btn-primary" onclick="return checkdata()">更新する</button>
            </form>
        </div>
    </div>
</div>
<footer>
    Copyright &copy; Seedkun Inc.
</footer>
<script>
    function checkdata() {
        const title = document.getElementById('title').value.trim();
        const contents = document.getElementById('contents').value.trim();
        const newImage = document.getElementById('new_image').value.trim();

        if (title.length === 0 || contents.length === 0) {
            alert("目標と詳細は必須です");
            return false;
        }

        // 画像が選択されていない場合でも更新可能にする場合は以下をコメントインしてください
        // if (newImage.length === 0) {
        //     alert("画像が未選択ですが、更新を続行します");
        // }

        return true;
    }
</script>

  @endsection