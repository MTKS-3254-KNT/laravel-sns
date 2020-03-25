<nav class="navbar navbar-expand navbar-dark blue-gradient">

  <a class="navbar-brand" href="/"><i class="far fa-sticky-note mr-1"></i>PHP・Laravel練習アプリ</a>

  <ul class="navbar-nav ml-auto">

    @guest
    <!-- ゲストでアクセス時の表示 -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a>
      <!-- ユーザー登録のコントローラーへ -->
    </li>
    @endguest
    <!-- ENDと同意 -->

    @guest
    <!-- ゲストでアクセス時の表示 -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('login') }}">ログイン</a>
      <!-- ログインページへ移動 -->
    </li>
    @endguest
    <!-- ENDと同意 -->
      
    @auth
    <!-- ログイン状態での表示 -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('articles.create') }}"><i class="fas fa-pen mr-1"></i>投稿する</a>
      

    </li>
    @endauth
    <!-- ENDと同意 -->

    
    @auth
    <!-- ログイン状態での表示 -->

    <!-- ドロップダウンで表示される画面 -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
         aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-circle"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <button class="dropdown-item" type="button"
                onclick="location.href=''">
                <!-- ユーザーのマイページへアクセスするリンク -->
          マイページ
        </button>
        <div class="dropdown-divider"></div>
        <button form="logout-button" class="dropdown-item" type="submit">
        <!-- formタグのid属性と同じにすることで関連付けをしている。 -->
          ログアウト
        </button>
      </div>
    </li>
    <form id="logout-button" method="POST" action="{{ route('logout') }}">
    <!-- HTTPメソッドを使用するのフォームを使用しログアウトボタンが押された情報をルーティングへ飛ばす -->
      @csrf
    </form>
    <!-- ドロップダウン終了 -->

    @endauth
    <!-- ENDと同意 -->

  </ul>

</nav>