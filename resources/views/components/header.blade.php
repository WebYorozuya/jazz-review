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
        <!-- <input id="header-loginUser-dd-check" class="header-loginUser-dd-check" type="checkbox"> -->
        <div class="header-loginUser">
          <div class="header-loginUser-dd-label">
            <i class="far fa-user-circle fa-2x"></i>
            <span>ログイン</span>
          </div>
          <ul class="header-loginUser-dd-content">
            @if (Route::has('login'))
            @auth
            <li><a href="{{ url('/home') }}" class="hello-user ">こんにちは<br>{{$user}}さん</a></li>
            @else
            <li><a href="{{ route('login') }}" class="hello-user header-loginUser-dd-content-login">ログイン</a></li>
            @if (Route::has('register'))
            <li><a href="{{ route('register') }}" class="hello-user header-loginUser-dd-content-account">アカウント登録</a></li>
            @endif
            @endauth
            @endif
          </ul><!-- /.header-loginUser-dd-content -->
        </div><!-- /.header-loginUser -->
      </div><!-- /.header-end -->
    </div><!-- /.header-container -->
  </header>
  <div class="back"></div>