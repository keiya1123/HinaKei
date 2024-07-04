@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('works.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label style="font-size: 20px">目標</label>
                    <input type="text" class="form-control" placeholder="目標を入力して下さい" name="title" id="title" style="margin-bottom: 20px">
                </div>
                <div class="form-group">
                    <label style="font-size: 20px">詳細</label>
                    <textarea class="form-control" placeholder="目標を達成するために・具体的にどうするの・数値が好ましいよね" rows="10" name="contents" id="contents" style="margin-bottom: 20px"></textarea>
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
                    <label style="font-size: 20px">画像</label>
                    <input type="file" class="form-control" name="image_at" id="image_at" style="margin-bottom: 20px">
                </div>
                <button type="submit" class="btn btn-primary" onclick="return checkdata()">作成</button>
                <a href="{{ route('works.index') }}" class="btn btn-danger m-1">一覧に戻る</a>
                {{-- <button class="btn btn-primary" {{ route('works.index') }}>一覧に戻る</button> --}}
            </form>
        </div>
    </div>
</div>
<footer>
    Copyright &copy; Softball Club.
</footer>

  <script>
    function checkdata()
    {
        const title = document.getElementById('title').value.replace(/\s/g, '');
        const contents = document.getElementById('contents').value.replace(/\s/g, '');
        const image_at = document.getElementById('image_at').value;

        if(title.length == 0 && contents.length == 0 && image_at == "") {
            alert("目標と詳細と画像が未入力です");
            return false;
        }


        if(title.length == 0 && contents.length == 0) {
            alert("目標と詳細が未入力です");
            return false;
        }

        if(title.length == 0 && image_at == "") {
            alert("目標と画像が未入力です");
            return false;
        }

        if(contents.length == 0 && image_at == "") {
            alert("詳細と画像が未入力です");
            return false;
        }

        if(title.length == "") {
            alert("目標が未入力です");
            return false;
        }
        if(contents.length == "") {
            alert("詳細が未入力です");
            return false;
        }
        if(image_at == "") {
            alert("画像が未入力です");
            return false;
        }

        return true;
    }
</script>
  @endsection

