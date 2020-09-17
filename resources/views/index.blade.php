<!DOCTYPE html><!--9.16 GitHub mikeブランチから-->
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <!-- Heroku用 -->
    <link rel="stylesheet" href="{{secure_asset('css/styles.css')}}">
    <!-- ローカル用 -->
    <!-- <link rel="stylesheet" href="{{asset('css/styles.css')}}"> -->
    <title>Jazz Log</title>
</head>

<body class="UI_Build_Assistant">

    <header>
        <div class="header-container">
            <div class="header-start">
                <div class="header-siteName">
                    <a href="#"><img src="images/JazzLog-logo-white.png" class="siteLogo"></a>
                </div>
                <from class="header-search" action="cgi-bin/example.cgi" method="post">
                    <div id="search-units">
                        <input class="header-search-btn" type="submit" name="submit" value="">
                        <img src="images/icons8-search-24.png" class="searchImg">
                        <input id="header-search-text" type="search" name="search" placeholder="キーワードで検索">
                        <input id="header-search-text-checkBox" type="checkbox" />
                    </div>
                </from>
            </div>
            <div class="header-end">
                <div class="header-post">
                    <a href="/post"><img src="images/icons8-edit-24-white.png" class="editImg"><span>投稿する</span></a>
                </div>
                @if (Route::has('login'))
                <div class="header-loginUser">
                    <input id="header-loginUser-acd-check" class="header-loginUser-acd-check" type="checkbox">
                    <label class="header-loginUser-acd-label" for="header-loginUser-acd-check">
                        <img src="images/icons8-user-male-30-white.png" class="userMaleImg">
                        @auth
                        <a href="{{ url('/home') }}" class="hello-user">こんにちは<br>{{$user}}さん</a>
                        @else
                        <a href="{{ route('login') }}" class="hello-user">ログイン</a>
                        <!-- <img src="images/icons8-user-male-30-white.png" class="userMaleImg">これ無い方がいい -->
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
                        <a href="#" class="li-newInformation"><img
                                src="images/icons8-music-24-black.png"><span>新着レビュー</span></a>
                    </li>
                    <li>
                        <a href="#" class="li-player"><img
                                src="images/icons8-myspace-24-black.png"><span>レビュワータグ</span></a>
                    </li>
                    <li>
                        <a href="#" class="li-livehouse"><img
                                src="images/icons8-home-24-black.png"><span>ライブハウスタグ</span></a>
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
                    <div class="main-upload-btns">
                        <a href="#"><img src="images/icons8-back-24-black.png"><span>前の10件</span></a>
                        <a href="#"><span>次の10件</span><img src="images/icons8-forward-24-black.png"></a>
                    </div>
                    <div class="main-newReview-title">新着順</div>
                    @foreach ($items as $item)
                    <div class="main-newReview">
                        <div class="main-newReview-upperColumn">
                            <div class="main-newReview-upperColumn-left">
                                <div class="main-newReviewerFig">
                                    <img src="images/icons8-user-male-30-black.png" class="main-userMaleImg">
                                </div>
                                <div class="main-newReviewerName">{{$item->getData()}}</div>
                            </div>
                            <div class="main-newReview-upperColumn-right">
                                <div class="main-newReviewEvaluation">
                                    <img src="images/icons8-like-24-black.png">
                                    <span>16</span>
                                </div>
                                <div class="main-newReviewUploadDate">2days ago</div>
                            </div>
                        </div><!-- /.main-newReview-upperColumn -->
                        <div class="main-newReview-middleColumn">
                            <div class="main-newReviewDate">{{$item->live_date}}</div>
                            <div class="main-newReviewPerformerName">{{$item->title}}</div>
                            <!-- <div class="main-newReviewPlace">@ 東京</div> -->
                        </div>
                        <div class="main-newReview-lowerColumn">
                            <input id="openCloseCheckBox" type="checkbox" />
                            <div id="main-newReviewText">
                             {{$item->text}}
                            </div>
                            <div class="main-newReviewOpenClose">
                                <img src="images/icons8-double-down-24-black.png" id="openImg">
                                <img src="images/icons8-double-up-24-black.png" id="closeImg">
                            </div>
                        </div>
                    </div><!-- /.main-newReview 1投稿のお尻 -->
                    @endforeach
                    <div class="main-upload-btns">
                        <a href=""><img src="images/icons8-back-24-black.png"><span>前の10件</span></a>
                        <a href=""><span>次の10件</span><img src="images/icons8-forward-24-black.png"></a>
                    </div>
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
                <a href="#" class="information1">お問い合わせ</a>
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

        headerSearch.addEventListener("click", headerSearchTextShow, false);
        
    </script>
</body>

</html>