<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact</title>
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    <!-- Heroku用CSS -->
    <link rel="stylesheet" href="{{secure_asset('css/contact.css')}}">
    <!-- ローカル用CSS -->
    <!-- <link rel="stylesheet" href="{{asset('css/contact.css')}}"> -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
      integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc"
      crossorigin="anonymous"
    />
  </head>

  <body class="UI_Build_Assistant">
    <header>
      <div class="header-container">
        <div class="header-start">
          <div class="header-siteName">
            <a href="#"
              ><img src="images/JazzLog-logo-white.png" class="siteLogo"
            /></a>
          </div>
          <from
            class="header-search"
            action="cgi-bin/example.cgi"
            method="post"
          >
            <div id="search-units">
              <input
                class="header-search-btn"
                type="submit"
                name="submit"
                value=""
              />
              <img src="images/icons8-search-24.png" class="searchImg" />
              <input
                id="header-search-text"
                type="search"
                name="search"
                placeholder="キーワードで検索"
              />
              <input id="header-search-text-checkBox" type="checkbox" />
            </div>
          </from>
        </div>
        <div class="header-end">
          <div class="header-post">
            <a href="#"
              ><img
                src="images/icons8-edit-24-white.png"
                class="editImg"
              /><span>投稿する</span></a
            >
          </div>
          <div class="header-loginUser">
            <input
              id="header-loginUser-acd-check"
              class="header-loginUser-acd-check"
              type="checkbox"
            />
            <label
              class="header-loginUser-acd-label"
              for="header-loginUser-acd-check"
            >
              <img
                src="images/icons8-user-male-30-white.png"
                class="userMaleImg"
              /><span>ログイン</span></label
            >
            <div class="header-loginUser-acd-content">
              <a href="#">
                <div class="header-loginUser-acd-content-login">ログイン</div>
              </a>
              <a href="#">
                <div class="header-loginUser-acd-content-logout">
                  ログアウト
                </div>
              </a>
              <a href="#">
                <div class="header-loginUser-acd-content-account">
                  アカウント登録
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="home">
      <div class="home-container">
        <nav>
          <ul class="pc-nav">
            <li>
              <a href="#" class="li-newInformation"
                ><img src="images/icons8-music-24-black.png" />
                <span>新着レビュー</span></a
              >
            </li>
            <li>
              <a href="#" class="li-player"
                ><img src="images/icons8-myspace-24-black.png" />
                <span>レビュワータグ</span></a
              >
            </li>
            <li>
              <a href="#" class="li-livehouse"
                ><img src="images/icons8-home-24-black.png" />
                <span>ライブハウスタグ</span></a
              >
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
                <input type="submit" value="選択" />
              </div>
            </form>
          </div>
        </nav>

        <div class="right-container">
          <!-- ここからメインエリア -->
          <main>
            <!-- チーム紹介 -->
            <div class="main-container-team">
              <h1>開発者</h1>
              
              <div class="team-member">
                <div class="member-info">
                  <img src="images/kaku.jpeg" alt="kakudaisukeの写真" class="profile-img"/>
                  <div class="member-name">kakudaisuke</div>
                  <ul class="member-sns-btn">
                    <li class="twitter-btn">
                      <a href="#">
                      <i class="fab fa-twitter-square fa-lg"></i></a>
                    </li>
                    <li class="facebook-btn">
                      <a href="#">
                      <i class="fab facebook-square fa-facebook-square fa-lg"></i></a>
                    </li>
                  </ul>
                </div>

                <div class="member-info">
                  <img src="images/mike.jpg" alt="mikeの写真" class="profile-img" />
                  <div class="member-name">mike</div>
                  <ul class="member-sns-btn">
                    <li class="twitter-btn">
                      <a href="#">
                      <i class="fab fa-twitter-square fa-lg"></i></a>
                    </li>
                    <li class="facebook-btn">
                      <a href="#">
                      <i class="fab facebook-square fa-facebook-square fa-lg"></i></a>
                    </li>
                  </ul>
                </div>

                <div class="member-info">
                  <img src="images/tsuka.jpg" alt="tsukaの写真" class="profile-img" />
                  <div class="member-name">tsuka</div>
                  <ul class="member-sns-btn">
                    <li class="twitter-btn">
                      <a href="#">
                      <i class="fab fa-twitter-square fa-lg"></i></a>
                    </li>
                    <li class="facebook-btn">
                      <a href="#">
                      <i class="fab facebook-square fa-facebook-square fa-lg"></i></a>
                    </li>
                  </ul>
                </div>

                <div class="member-info">
                  <img src="images/ayaka.jpg" alt="ayakaの写真" class="profile-img" />
                  <div class="member-name">ayaka</div>
                  <ul class="member-sns-btn">
                    <li class="twitter-btn">
                      <a href="#">
                      <i class="fab fa-twitter-square fa-lg"></i></a>
                    </li>
                    <li class="instagram-btn">
                      <a href="#">
                      <i class="fab fa-instagram-square fa-lg"></i></a>
                    </li>
                  </ul>
                </div>
              </div> <!-- .team-member -->

              <div class="team-about">
                <p>
                  プログラミング初学者の私たちですが、<a
                    href="https://www.youtube.com/channel/UCHxqQ8bUg5F2GW79D_DvSjQ/featured"
                    >YouTube万屋エンジニアチャンネル</a
                  >のコミュニティ内で、学習がてらWebサービスを作ってみようというプロジェクトを立ち上げました。ジャズライブに行った人が感想を書き込んでシェアできる口コミサイトを作っています（このコロナ禍に）。
                  現在、おさないさんという超絶強力なメンターと先にプロジェクトを立ち上げている先人にアドバイスを仰ぎながら、初心者しかいない４人のチームでよちよち歩んでいます。
                </p>
              </div>

              <div class="supporter">
                <a href="https://www.youtube.com/channel/UCHxqQ8bUg5F2GW79D_DvSjQ/featured">
                <i class="fab fa-youtube fa-5x"></i></a>
                <a href="https://twitter.com/YorozuyaOsanai">
                  <img src="images/webyorozuya.png" alt="web万屋チャンネルロゴ"/>
                </a>
              </div>
            </div> <!-- .main-container-team -->

            <!-- お問い合わせフォーム -->
            <div class="main-container-contact">
              <h1>お問い合わせ</h1>
              
              <form action="send" accept-charset="UTF-8" method="post">
                @csrf
                <div class="contact-form">
                  <label class="email" for="address">メールアドレス</label>
                  <input type="email" name="email" id="address" required />
                  <input type="hidden" name="" value="hidden" />
                </div>

                <div class="contact-form">
                  <label class="account-name" for="account">お名前</label>
                  <input type="text" name="name" id="account"/>
                  <input type="hidden" name="" value="hidden" />
                </div>
                
                <!-- <div class="contact-form">
                  <label class="message-title" for="title">件名</label>
                  <input type="text" name="" id="title"/>
                  <input type="hidden" name="" value="hidden" />
                </div> -->
                
                <div class="contact-form">
                  <label class="message" for="message-form">お問い合わせの内容</label>
                  <textarea name="text" cols="40" rows="8" id="message-form" required></textarea>
                  <input type="hidden" name="" value="hidden" />
                </div>
                
                <div class="send-btn">
                  <input type="submit" name="" value="送信する" />
                  <input type="hidden" name="" value="hidden" />
                </div>
              </form>
            </div> <!-- main-container-contact -->
          
          </main>
          <aside>
            <!-- <a href="#">
                    <div class="ad1">advertisement1</div>
                </a>
                <a href="#">
                    <div class="ad2">advertisement2</div>
                </a> -->
          </aside>
        </div> <!-- .right-container -->
      </div> <!-- .home-container -->
    </div> <!-- .home -->
   
    <footer>
      <p><small> &copy; Jazz Log </small></p>
    </footer>
  </body>
</html>
