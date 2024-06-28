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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>
<body>
  <header>
    <div class="header-left">
            <img class="logo" src="./logo.png" alt="">
        </div>
        <div class="header-right">
            <ul class="nav">
                <li><a href="#">{{ Auth::user()->name }}</a></li>
            </ul>
        </div>
  </header>
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card mt-3">
                  <div class="card-header">
                      <h5>タイトル：{{ $work->title }}</h5>
                  </div>
                  <div class="card-body">
                  <p class="card-text">内容：{{ $work->contents }}</p>
                  <p>投稿日時：{{ $work->created_at }}</p>
                  <a href="{{ route('works.edit' , $work->id) }}" class="btn btn-primary">編集する</a>
                  <form action='{{ route('works.destroy' , $work->id) }}' method='post'>
                    @csrf
                    @method('delete')
                      <input type='submit' value='削除' class="btn btn-danger" onclick='return confirm("本当に削除しますか？");'>
                  </form>
                  </div>
              </div>
          </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8">
                <button type="button" class="btn btn-primary">コメントする</button>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
          コメント一覧
            <div class="card mt-3">
                <h5 class="card-header">投稿者：Seedさん</h5>
                <div class="card-body">
                    <h5 class="card-title">投稿日時：2021/11/08</h5>
                    <p class="card-text">内容：今日のセブは快晴</p>
                </div>
            </div>
        </div>
      </div>
  </div>
  <footer>
    Copyright &copy; Seedkun Inc.
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>
