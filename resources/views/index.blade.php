<!DOCTYPE html><!--9.16 GitHub mikeブランチから-->
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/aaab412f99.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"> -->
    <!-- Heroku用 -->
    <link rel="stylesheet" href="{{secure_asset('css/styles.css')}}">
    <!-- ローカル用 -->
    <!-- <link rel="stylesheet" href="{{asset('css/styles.css')}}"> -->
    <style>
        .pagination {
            font-size: 15px;
        }
        .pagination li {
            display: inline-block;
        }
    </style>
    <title>Jazz Log</title>
</head>
<body class="UI_Build_Assistant">
<header>
  <div class="header-container">
    <div class="header-start">
      <div class="header-siteName">
        <a href="#"><img src="images/JazzLog-logo-white.png" class="siteLogo"></a>
      </div>
      <form class="header-search" action="cgi-bin/example.cgi" method="post">
        <!-- <div id="search-units"> -->
            <!-- <input class="header-search-btn" type="submit" name="submit" value=""> -->
            <i class="fas fa-search"></i>
            <input id="header-search-text" type="search" name="search" placeholder="キーワードで検索">
            <!-- <input id="header-search-text-checkBox" type="checkbox" /> -->
        <!-- </div> -->
      </form>
    </div>
    <div class="header-end">
            <a href="post" class="header-post">
            <i class="fas fa-pen-nib"></i>
                投稿する
            </a>
        @if (Route::has('login'))
        <div class="header-loginUser">
            <!-- <input id="header-loginUser-acd-check" class="header-loginUser-acd-check" type="checkbox"> -->
            <label class="header-loginUser-acd-label" for="header-loginUser-acd-check">
            <i class="far fa-user-circle fa-2x"></i>
                @auth
                <a href="{{ url('/home') }}" class="hello-user">こんにちは<br>{{$user}}さん</a>
                @else
                <a href="{{ route('login') }}" class="hello-user">ログイン</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="hello-user">アカウント登録</a>
                @endif
            @endauth
            </label>
            <div class="header-loginUser-acd-content">
                <a href="/login">
                    <div class="header-loginUser-acd-content-login">ログイン</div>
                </a>
                <a href="#">
                    <div class="header-loginUser-acd-content-logout">ログアウト</div>
                </a>
                <a href="#">
                    <div class="header-loginUser-acd-content-account">アカウント登録</div>
                </a>
            </div><!-- /.header-loginUser-acd-content -->
        </div><!-- /.header-loginUser -->
        @endif                
    </div><!-- /.header-end -->
  </div><!-- /.header-container -->
</header>
<div class="home">
  <div class="home-container">
    <nav>
      <ul class="pc-nav">
        <li>
          <a href="#" class="li-newInformation">
            <i class="fas fa-music fa-lg"></i>
            <span>新着レビュー</span>
          </a>
        </li>
        <li>
          <a href="#" class="li-player">
            <i class="fas fa-tags"></i>
            <span>タグ</span>
          </a>
        </li>
        <li>
          <a href="post" class="li-livehouse">
            <i class="fas fa-pen-nib"></i>
            <span>投稿する</span>
          </a>
        </li>
        <li>
          <a href="contact" class="li-livehouse">
            <i class="far fa-smile"></i>
            <span>Contact us</span>
          </a>
        </li>
      </ul>
      <div class="mobile-nav">
        <form method="get" action="" class="mobile-nav-form">
            <div class="pulldown">
                <select name="pulldown" class="pulldown-option" required>
                    <option value="">選択してください</option>
                    <option value="選択肢1">新着順</option>
                    <option value="選択肢2">プレイヤー</option>
                    <option value="選択肢3">ライブハウス</option>
                </select>
            </div>
            <div class="pulldown-select">
                <input type="submit" value="選択">
            </div>
        </form>
      </div>
    </nav>
    <div class="right-container">
        <main>
            <h1 class="main-newReview-title">新着レビュー</h1>
            @foreach ($items as $item)
            <div class="review">
              <div class="review-left">
                <a href="#" class="user-image">
                  <img src="images/icons8-user-male-30-black.png" alt="">
                </a>
              </div><!-- /.review-left -->
              <div class="review-right">
                <div class="review-top">
                  <h2>{{$item->live_date}} {{$item->title}}</h2>
                  <a href="modify" class="review-action">
                    <i class="fas fa-ellipsis-h"></i>
                  </a>
                </div><!-- /.review-right-top -->
                <div class="tags">
                  <a href="#" class="tag">jazz</a>
                  <a href="#" class="tag">東京</a>
                  <a href="#" class="tag">おしゃれ</a>
                </div>
                <p>{{$item->text}}</p>
                <div class="review-bottom">
                  <span class="user-name">by {{$item->getData()}}さん</span>
                  <span class="created-at">{{$item->created_at}}</span>
                  <span class="likes">
                    <i class="far fa-heart"></i>
                    <span class="like-counter">00</span>
                  </span>
                </div><!-- /.review-bottom -->
              </div><!-- /.review-right -->

            </div><!-- /.main-newReview 1投稿のお尻 -->
            @endforeach
            {{ $items->links('vendor.pagination.bootstrap-4')}}
        </main>
        <aside>
            <!-- <a href="#">
                <div class="ad1">advertisement1</div>
            </a>
            <a href="#">
                <div class="ad2">advertisement2</div>
            </a> -->
        </aside>
    </div>
  </div>
</div>
<footer>
    <div class="footer-container">
        <div class="footer-left">
            <div class="footer-left">
                <a href="#"><img src="images/JazzLog-logo-white.png" class="footer-siteLogo"></a>
                <div class="footer-subTitle">♪♪ Jazz for all people ♪♪</div>
            </div>
        </div>
        <div class="footer-right">
            <a href="contact" class="information1">お問い合わせ</a>
            <a href="#" class="information2">利用規約</a>
        </div>
    </div>
</footer>
    <script>
        //ボタンを押すことで開閉する機能
        let openCloseBtn = document.getElementsByClassName("main-newReviewOpenClose");

        function openClose(event) {
            const oI = document.getElementById("openImg");
            const cI = document.getElementById("closeImg");
            const checkbox = document.getElementById("openCloseCheckBox");
            const newReviewTextHeight = document.querySelector("#main-newReviewText");
            const textHeight = newReviewTextHeight.getBoundingClientRect().height;

            if (checkbox.checked == true) {
                checkbox.checked = false;
                oI.style.display = "block";
                cI.style.display = "none";
                newReviewTextHeight.style.height = (textHeight - 50) + "px";

            } else {
                checkbox.checked = true;
                oI.style.display = "none";
                cI.style.display = "block";
                newReviewTextHeight.style.height = (textHeight + 50) + "px";
            }
        }

        for (i = 0; i < openCloseBtn.length; i++) {
            openCloseBtn[i].addEventListener("click", openClose, false);
        }

        //ボタンを押すことでテキストのshow,hideを切り替える。
        let headerSearch = document.getElementsByClassName("header-search");

        function headerSearchTextShow() {
            const headerSearchTextCheckbox = document.getElementById("header-search-text-checkBox");
            const headerSearchText = document.getElementById("header-search-text");

            if (headerSearchTextCheckbox.checked == true) {
                headerSearchTextCheckbox.checked = false;
                headerSearchText.style.display = "none";
            } else {
                headerSearchTextCheckbox.checked = true;
                headerSearchText.style.display = "block";
            }
        }

        // headerSearch.addEventListener("click", headerSearchTextShow, false);
        
    </script>
</body>

</html>
