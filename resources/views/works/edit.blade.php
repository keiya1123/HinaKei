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
                    <label style="font-size: 20px; margin-top:40px">目標</label>
                    <input type="text" class="form-control" value="{{ $work->title }}" name="title" id="title" style="margin-bottom: 20px">
                </div>
                <div class="form-group">
                    <label style="font-size: 20px">詳細</label>
                    <textarea class="form-control" rows="10" name="contents" id="contents" style="margin-bottom: 20px">{{ $work->contents }}</textarea>
                </div>
                <div class="form-group">
                    <label style="font-size: 20px; margin-bottom: 5px;">何月の目標</label><br>
                    <select name="pulldown" id="pulldown" placeholder="〜月" style="margin-bottom: 20px; width:90px; font-size:18px;">
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
                </div>
                <div class="form-group">
                    <label style="font-size: 20px">画像を選択してください</label>
                    <input type="file" class="form-control" name="image_at" id="image_at" style="margin-bottom: 20px">
                <button type="submit" class="btn btn-primary" onclick="return checkdata()">更新する</button>
                <a href="{{ route('works.index') }}" class="btn btn-danger m-1">一覧に戻る</a>
                
            </form>
        </div>
    </div>
</div>
<footer class="">
    Copyright &copy; Softball Club.
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