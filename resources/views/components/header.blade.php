<header>
  <div class="header-container">
    <div class="header-start">
      <div class="header-siteName">
        <a href="/"><img src="images/JazzLog-logo-white.png" class="siteLogo"></a>
      </div>
      <form class="header-search" action="{{ url('/search')}}" method="get">
        <i class="fas fa-search"></i>
        <input id="header-search-text" type="search" name="keyword" placeholder="キーワードで検索">
      </form>
    </div>
    <div class="header-right">
      <a href="post" class="header-post">
        <i class="fas fa-pen-nib"></i>
        <span>投稿する</span>
      </a>
      <div class="header-usermenu">
        <div class="header-loginUser-dd-label">
          <i class="far fa-user-circle fa-2x"></i>
          <span>{{$user}} さん</span>
        </div>
        <ul class="header-loginUser-dd-content">
          @if (Route::has('login'))
          @auth
          <li><a href="{{ url('/mypage') }}" class="hello-user">マイページ</a></li>
          <li><a href="{{ route('user.logout') }}" class="hello-user">ログアウト</a></li>
          @else
          <li><a href="{{ route('login') }}" class="hello-user login">ログイン</a></li>
          @if (Route::has('register'))
          <li><a href="{{ route('register') }}" class="hello-user account-register">アカウント登録</a></li>
          @endif
          @endauth
          @endif
        </ul><!-- /.header-loginUser-dd-content -->
      </div><!-- /.header-loginUser -->
    </div><!-- /.header-end -->
  </div><!-- /.header-container -->
</header>
<div class="back"></div>