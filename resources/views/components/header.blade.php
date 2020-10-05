<header>
    <div class="header-container">
      <div class="header-start">
        <div class="header-siteName">
          <a href="/"><img src="images/JazzLog-logo-white.png" class="siteLogo"></a>
        </div>
        <form class="header-search" action="cgi-bin/example.cgi" method="post">
          <i class="fas fa-search"></i>
          <input id="header-search-text" type="search" name="search" placeholder="キーワードで検索">
        </form>
      </div>
      <div class="header-end">
        <a href="post" class="header-post">
          <i class="fas fa-pen-nib"></i>
          <span>投稿する</span>
        </a>
        <!-- <input id="header-loginUser-acd-check" class="header-loginUser-acd-check" type="checkbox"> -->
        <div class="header-loginUser">
          <label class="header-loginUser-acd-label">
            <i class="far fa-user-circle fa-2x"></i>
            <span>ログイン</span>
          </label>
          <div class="header-loginUser-acd-content">
            @if (Route::has('login'))
            @auth
            <a href="{{ url('/home') }}" class="hello-user ">こんにちは<br>{{$user}}さん</a>
            @else
            <a href="{{ route('login') }}" class="hello-user header-loginUser-acd-content-login">ログイン</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="hello-user header-loginUser-acd-content-account">アカウント登録</a>
            @endif
            @endauth
            @endif
          </div><!-- /.header-loginUser-acd-content -->
        </div><!-- /.header-loginUser -->
      </div><!-- /.header-end -->
    </div><!-- /.header-container -->
  </header>
