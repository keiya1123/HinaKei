@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('works.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>目標</label>
                    <input type="text" class="form-control" placeholder="目標を入力して下さい" name="title" id="title">
                </div>
                <div class="form-group">
                    <label>詳細</label>
                    <textarea class="form-control" placeholder="目標を達成するために・具体的にどうするの・数値が好ましいよね" rows="10" name="contents" id="contents"></textarea>
                </div>
                <div class="form-group">
                    <label>何月の目標</label><br>
                    <select name="pulldown" id="pulldown" placeholder="〜月" >
                        <option value="1月">1月</option>
                        <option value="2月">2月</option>
                        <option value="3月">3月</option>
                        <option value="4月">4月</option>
                        <option value="5月">5月</option>
                        <option value="6月">6月</option>
                        <option value="7月">7月</option>
                        <option value="8月">8月</option>
                        <option value="9月">9月</option>
                        <option value="10月">10月</option>
                        <option value="11月">11月</option>
                        <option value="12月">12月</option>
                    </select>
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

