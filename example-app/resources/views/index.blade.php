<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  {{-- CSSを読み込む --}}
  {{-- assets関数の説明↓↓ --}}
  {{-- https://readouble.com/laravel/6.x/ja/helpers.html#method-asset --}}
  {{-- destyle.css（デフォルトのCSSを削除する） --}}
  {{-- https://github.com/nicolas-cusan/destyle.css/blob/master/destyle.css --}}
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
  
  {{-- JavaScriptを読み込む (defer属性をつけると最後に読み込まれる)--}}
  {{-- https://qiita.com/phanect/items/82c85ea4b8f9c373d684 --}}
  <script defer src="{{ asset('js/index.js') }}"></script>
  {{-- fontawsome読み込み --}}
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

  {{-- ホームページのタイトル --}}
  <title>Laravel-app</title>
</head>

<body>
  <header class="header">
    <div class="header__inner inner">
      <h1 class="header__title">
        <a href="{{ route('index') }}">CRUD App</a>
      </h1>
    </div>
  </header>

  <main class="main">
    <div class="main__inner inner">
      <form action="{{ route('create') }}" method="POST">
      {{-- csrf攻撃対策 （formの中にこの記述がないとエラーが出る）--}}
      @csrf
      {{-- @method('put') --}}
      <ul class="posts">
        @if($posts)
        {{-- 投稿が1件でもある場合 --}}
        @foreach($posts as $post)
          <li class="posts__item">
            <label class="label">タイトル</label>
            <input type="text" value="{{ $post['title'] }}" name="title[]" size="20">
            <label class="label">内容</label>
            <textarea name="description[]">{{ $post['description'] }}</textarea>
            <div class="buttonArea">
              <button class="submitButton" type="submit">更新</button>
              <button class="deleteButton" type="button">削除</button>
            </div>
          </li>
        @endforeach
        @else
          {{-- 投稿が1件もない場合、空のフォームを表示 --}}
          <li class="posts__item">
            <label class="label">タイトル</label>
            <input type="text" placeholder="タイトルを入力してください" value="" name="title" size="20">
            <label class="label">内容</label>
            <textarea name="description" placeholder="内容を入力してください"></textarea>
            <div class="buttonArea">
              <button class="submitButton" type="submit">登録</button>
              <button class="deleteButton" type="button">削除</button>
            </div>
          </li>
        @endif
      </ul>
    </form>
    </div>
  </main>
  <footer class="footer">
    <div class="footer__inner inner">
      <a class="footer__github-link" href="https://github.com/mackey0430/laravel-app"><i class="fa-brands fa-github"></i>Go to GitHub page</a>
    </div>
  </footer>
</body>
</html>