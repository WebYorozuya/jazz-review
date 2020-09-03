<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Jazz Log</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body class="UI_Build_Assistant">
    <header>
        <div class="header-container">
            <div class="header-start">
                <div class="header-siteName">
                    <a href=""><img src="images/JazzLog-logo-black.png" class="siteLogo"></a>
                </div>
                <from class="header-search" action="cgi-bin/example.cgi" method="post">
                    <div class="search-units">
                        <input class="header-search-btn" type="submit" name="submit" value="">
                        <img src="images/icons8-search-24.png" class="searchImg">
                        <input class="header-search-text1" type="search" name="search" placeholder="キーワードで検索">
                    </div>

                </from>
            </div>
            <div class="header-end">
                <div class="header-post">
                    <img src="images/icons8-edit-24-black.png" class="editImg">
                    <input class="header-post-btn" type="submit" name="post" value="投稿">
                </div>
                <div class="flex-center position-ref full-height">
                <img src="images/icons8-user-male-30-black.png" class="userMaleImg">
                @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif


            </div>
        </div>
        <div class="search-box"><input class="header-search-text2" type="search" name="search" placeholder="キーワードで検索"></div>
    </header>

    <div class="home">
        <div class="home-container">
            <nav>
                <ul class="pc-nav">
                    <li class="li-newInformation">
                        <a href=""><img src="images/icons8-music-24-black.png" class="li-newInformationImg"> </a>  
                        <div class="li-newInformation-text">新着順</div>
                    </li>
                    <li class="li-player">
                        <a href=""><img src="images/icons8-myspace-24-black.png" class="li-playerImg"></a>     
                        <div class="li-player-text">プレイヤー</div>
                    </li>
                    <li class="li-livehouse">
                        <a href=""><img src="images/icons8-home-24-black.png" class="li-livehouseImg"></a>                    
                        <div class="li-livehouse-text">ライブハウス</div>
                    </li>
                    <li class="li-reviewer">
                        <a href=""><img src="images/icons8-speech-bubble-24-black.png" class="li-reviewerImg"> </a> 
                        <div class="li-reviewer-text">レビュアー</div>
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
                    <div class="main-newReview-title">新着順</div>
                    <div class="main-newReview">
                        <div class="main-newReview-upperColumn">
                            <div class="main-newReview-upperColumn-left">
                                <div class="main-newReviewerFig">
                                    <img src="images/icons8-user-male-30-black.png" class="userMaleImg">
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
                            <div class="main-newReviewDate">2020/8/26</div>
                            <div class="main-newReviewPerformerName">演奏者名</div>
                            <div class="main-newReviewPlace">@ 東京</div>   
                        </div>
                        <div class="main-newReview-lowerColumn">
                            <div class="main-newReviewText">本文</div>
                            <div class="main-newReviewOpen">全文を表示する</div>
                        </div>
                    <div class="main-newReview">
                        <div class="main-newReview-upperColumn">
                            <div class="main-newReview-upperColumn-left">
                                <div class="main-newReviewerFig">
                                    <img src="images/icons8-user-male-30-black.png" class="userMaleImg">
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
                            <div class="main-newReviewDate">2020/8/26</div>
                            <div class="main-newReviewPerformerName">演奏者名</div>
                            <div class="main-newReviewPlace">@ 東京</div>   
                        </div>
                        <div class="main-newReview-lowerColumn">
                            <div class="main-newReviewText">本文</div>
                            <div class="main-newReviewOpen">全文を表示する</div>
                        </div>
                        <div class="main-newReview">
                            <div class="main-newReview-upperColumn">
                                <div class="main-newReview-upperColumn-left">
                                    <div class="main-newReviewerFig">
                                        <img src="images/icons8-user-male-30-black.png" class="userMaleImg">
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
                                <div class="main-newReviewDate">2020/8/26</div>
                                <div class="main-newReviewPerformerName">演奏者名</div>
                                <div class="main-newReviewPlace">@ 東京</div>   
                            </div>
                            <div class="main-newReview-lowerColumn">
                                <div class="main-newReviewText">本文</div>
                                <div class="main-newReviewOpen">全文を表示する</div>
                            </div>
                            <div class="main-newReview">
                                <div class="main-newReview-upperColumn">
                                    <div class="main-newReview-upperColumn-left">
                                        <div class="main-newReviewerFig">
                                            <img src="images/icons8-user-male-30-black.png" class="userMaleImg">
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
                                    <div class="main-newReviewDate">2020/8/26</div>
                                    <div class="main-newReviewPerformerName">演奏者名</div>
                                    <div class="main-newReviewPlace">@ 東京</div>   
                                </div>
                                <div class="main-newReview-lowerColumn">
                                    <div class="main-newReviewText">本文</div>
                                    <div class="main-newReviewOpen">全文を表示する</div>
                                </div>
                    <div class="main-newReview">
                        <div class="main-newReview-upperColumn">
                            <div class="main-newReview-upperColumn-left">
                                <div class="main-newReviewerFig">
                                    <img src="images/icons8-user-male-30-black.png" class="userMaleImg">
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
                            <div class="main-newReviewDate">2020/8/26</div>
                            <div class="main-newReviewPerformerName">演奏者名</div>
                            <div class="main-newReviewPlace">@ 東京</div>   
                        </div>
                        <div class="main-newReview-lowerColumn">
                            <div class="main-newReviewText">本文</div>
                            <div class="main-newReviewOpen">全文を表示する</div>
                        </div>
                    <div class="main-newReview">
                        <div class="main-newReview-upperColumn">
                            <div class="main-newReview-upperColumn-left">
                                <div class="main-newReviewerFig">
                                    <img src="images/icons8-user-male-30-black.png" class="userMaleImg">
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
                            <div class="main-newReviewDate">2020/8/26</div>
                            <div class="main-newReviewPerformerName">演奏者名</div>
                            <div class="main-newReviewPlace">@ 東京</div>   
                        </div>
                        <div class="main-newReview-lowerColumn">
                            <div class="main-newReviewText">本文</div>
                            <div class="main-newReviewOpen">全文を表示する</div>
                        </div>
                    </div>
      
                   
                </main>
                <aside>
                    <a href=""><div class="ad1">advertisement1</div></a>
                    <a href=""><div class="ad2">advertisement2</div></a>
                </aside>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer-container">
            <div class="footer-left">
                <div class="footer-left">
                    <a href=""><img src="images/JazzLog-logo-black.png" class="siteLogo"></a>
                    <div class="">サブタイトル</div>
                </div>
            </div>
            <div class="footer-right">
                <a href=""><div class="footer-right-information1"></a>
                   お問い合わせ
                </div>
                <a href=""><div class="footer-right-information2"></a>
                    利用規約
                </div>
            </div>
        </div>
    </footer>
</body>

</html>