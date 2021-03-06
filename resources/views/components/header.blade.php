<header>
  <div class="header-container">
    <div class="header-start">
      <div class="header-siteName">
        <a href="{{ route('top') }}"><img src="images/JazzLog-logo-white.png" class="siteLogo"></a>
      </div>
      <form id="header-search" class="header-search header-search-min" action="{{ url('search') }}" method="get">
        <i id="header-search-button" class="header-search-button fas fa-search"></i>
        <input id="header-search-text" class="header-search-text" type="search" name="keyword" placeholder="キーワードで検索">
        <div id="header-search-text-bg" class="header-search-text-bg"></div>
      </form>
    </div><!-- header-start -->
    <div id="header-right" class="header-right">
      <div class="header-post">
        <a href="post" class="header-post-link">
          <i class="fas fa-pen-nib"></i>
          <span>投稿する</span>
        </a>
      </div><!-- ./header-post -->
      <div class="header-usermenu">
        <div class="header-loginUser-dd-label">
          <i class="far fa-user-circle fa-2x"></i>
          @auth
            <span>{{ Auth::user()->account_name }}さん</span>
          @endauth
          @guest
            <span>ゲストさん</span>
          @endguest
        </div>
        <ul class="header-loginUser-dd-content">
          @auth
            <li  class="user-menu-list"><a href="{{ route('profile') }}">設定</a></li>
            <li  class="user-menu-list"><a href="{{ route('user.logout') }}">ログアウト</a></li>
          @endauth
          @guest
            <li  class="user-menu-list"><a href="{{ route('login') }}">ログイン</a></li>
            <li  class="user-menu-list"><a href="{{ route('register') }}">アカウント登録</a></li>
          @endguest
        </ul><!-- /.header-loginUser-dd-content -->
      </div><!-- /.header-loginUser -->
    </div><!-- /.header-end -->
  </div><!-- /.header-container -->
</header>
<div class="back-to-escape"></div>
