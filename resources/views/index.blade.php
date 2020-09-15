<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Jazz Log</title>
    <link rel="stylesheet" href="{{secure_asset('css/styles.css')}}">
</head>

<body class="UI_Build_Assistant">

    <header>
        <div class="header-container">
            <div class="header-start">
                <div class="header-siteName">
                    <a href="#"><img src="images/JazzLog-logo-white.png" class="siteLogo"></a>
                </div>

                <from class="header-search" action="cgi-bin/example.cgi" method="post">
                    <div class="search-units">
                        <input class="header-search-btn" type="submit" name="submit" value="">
                        <img src="images/icons8-search-24.png" class="searchImg">
                        <input class="header-search-text" type="search" name="search" placeholder="キーワードで検索">
                    </div>

                </from>
            </div>
            <div class="header-end">
                <div class="header-post">
                    <a href="/post"><img src="images/icons8-edit-24-white.png" class="editImg"><span>投稿する</span></a>
                </div>
                @if (Route::has('login'))
                <div class="header-loginUser">
                    <img src="images/icons8-user-male-30-white.png" class="userMaleImg">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                    <a href="{{ route('login') }}">Login</a>
                    <img src="images/icons8-user-male-30-white.png" class="userMaleImg">
                    @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
                @endif
            </div>
        </div>
    </header>
    <div class="home">
        <div class="home-container">
            <nav>
                <ul class="pc-nav">
                    <li>
                        <a href="#" class="li-newInformation">
                            <img src="images/icons8-music-24-black.png" class="li-newInformationImg">
                            <div class="li-newInformation-text">新着順</div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="li-player">
                            <img src="images/icons8-myspace-24-black.png" class="li-playerImg">
                            <div class="li-player-text">プレイヤー</div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="li-livehouse">
                            <img src="images/icons8-home-24-black.png" class="li-livehouseImg">
                            <div class="li-livehouse-text">ライブハウス</div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="li-reviewer">
                            <img src="images/icons8-speech-bubble-24-black.png" class="li-reviewerImg">
                            <div class="li-reviewer-text">レビュアー</div>
                        </a>
                    </li>
                </ul>
                <form method="get" action="" class="mobile-nav">
                    <p class="pulldown">
                        <select name="pulldown" required>
                            <option value=""></option>
                            <option value="選択肢1">新着順</option>
                            <option value="選択肢2">プレイヤー</option>
                            <option value="選択肢3">ライブハウス</option>
                            <option value="選択肢4">レビュアー</option>
                        </select>
                    </p>
                    <p><input type="submit" value="完了" class="pulldown-select"></p>
                </form>
            </nav>
            <div class="right-container">
                <main>
                    <div class="main-upload-btns">
                        <a href="" class="main-upload-backBtn">
                            <img src="images/icons8-back-24-black.png" class="main-upload-backBtnImg">
                            <div class="main-upload-backBtnText">前の10件</div>
                        </a>
                        <a href="" class="main-upload-forwardBtn">
                            <div class="main-upload-forwardBtnText">次の10件</div>
                            <img src="images/icons8-forward-24-black.png" class="main-upload-forwardBtnImg">
                        </a>
                    </div>
                    <div class="main-newReview-title">新着順</div>
                    @foreach ($items as $item)
                    <div class="main-newReview">
                        <div class="main-newReview-upperColumn">
                            <div class="main-newReview-upperColumn-left">
                                <div class="main-newReviewerFig">
                                    <img src="images/icons8-user-male-30-black.png" class="main-userMaleImg">
                                </div>
                                <div class="main-newReviewerName">mike</div>
                            </div>

                            <div class="main-newReview-upperColumn-right">
                                <div class="main-newReviewEvaluation">
                                    <img src="images/icons8-like-24-black.png" class="likeImg">
                                    <div class="like-counter">16</div>
                                </div>
                                <div class="main-newReviewUploadDate">2days ago</div>
                            </div>
                        </div>
                        <div class="main-newReview-middleColumn">
                            <div class="main-newReviewDate">{{$item->live_date}}</div>
                            <div class="main-newReviewPerformerName">{{$item->title}}</div>
                            <!-- <div class="main-newReviewPlace">{{$item->venue}}</div>    -->
                        </div>
                        <div id="main-newReview-lowerColumn">
                            <input id="openCloseCheckBox" type="checkbox" />
                            <div id="main-newReviewText">
                                最高！最高！最高！最高！最高！最高！最高！最高！最高！最高！
                                最高！最高！最高！最高！最高！最高！最高！最高！最高！最高！
                                最高！最高！最高！最高！最高！最高！最高！最高！最高！最高！
                                最高！最高！最高！最高！最高！最高！最高！最高！最高！最高！
                            </div>

                            <div id="main-newReviewOpenClose">
                                <img src="images/icons8-double-down-24-black.png" id="openImg">
                                <img src="images/icons8-double-up-24-black.png" id="closeImg">
                            </div>
                        </div>
                    </div>
                    @endforeach
                    