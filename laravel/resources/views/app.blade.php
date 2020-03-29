<!DOCTYPE html>
<html lang="ja">
<!-- 👆ドキュメントの言語が日本語であることを宣言 -->
<head>
  <meta charset="utf-8">
  <!-- 👆文字コードの指定 -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- 👆セスポンシブデザインを設定するための記述 -->
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- 👆ユーザーが利用できる範疇で互換性モードを設定できるようにするための記述 -->
  <title>
    @yield('title')
  </title>
  <!-- 👆タイトルの読み込み -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- 👆FontAwesomeを使用するための記述 -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <!-- 👆Bootstrapを読み込むための記述 -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">
  <!-- 👆Material Design for Bootstrapを導入するための記述 -->
</head>

<body>
  <div id="app">
  <!-- JavaScriptをBladeに読み込ませるためのID -->
  @yield('content')
  <!-- 👆コンテンツの読み込み -->
</div>

  <script src="{{ mix('js/app.js') }}"></script>
  <!-- JavaScriptをBladeに読み込ませるための記述 -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- 👆JQueryを使用するための記述 -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <!-- 👆Bootstrapのツールチップを使用するための記述 -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- 👆Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js"></script>
  <!-- 👆MDB core JavaScript -->

</body>

</html>