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
            <form action="{{ route('works.update' , $work->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label>タイトル</label>
                    <input type="text" class="form-control" value="{{ $work->title }}" name="title" id="title">
                </div>
                <div class="form-group">
                    <label>内容</label>
                    <textarea class="form-control" rows="5" name="contents" id="contents">{{ $work->contents }}</textarea>
                </div>
                <div class="form-group">
                    <label>画像</label>
                    <textarea class="form-control" rows="10" name="image_at" id="image_at">{{ $work->image_at }}
                    </textarea>
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
    function checkdata()
    {
        const title = document.getElementById('title').value.replace(/\s/g, '')
        const contents = document.getElementById('contents').value.replace(/\s/g, '')
        const image_at = document.getElementById('image_at').value.replace(/\s/g, '')

        if(title.length == 0 && contents.length == 0 && image_at.length == 0) {
            alert("目標と詳細と画像が未入力です")
            return false
        }

        if(title.length == 0 && contents.length == 0) {
            alert("目標と詳細が未入力です")
            return false
        }

        if(contents.length == 0 && image_at.length == 0) {
            alert("詳細と画像が未入力です")
            return false
        }

        if(title.length == 0 && image_at.length == 0) {
            alert("目標と画像が未入力です")
            return false
        }

        if(title.length == 0) {
            alert("目標が未入力です")
            return false
        }

        if(contents.length == 0) {
            alert("詳細が未入力です")
            return false
        }

        if(image_at.length == 0) {
            alert("画像が未入力です")
            return false
        }
    }
  </script>
  @endsection