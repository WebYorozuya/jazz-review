@extends('layouts.public')

@section('title', 'お問い合わせ')

@section('css')
  @env('local')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
  @endenv
  @production
    <link rel="stylesheet" href="{{ secure_asset('css/contact.css') }}">
  @endproduction
@endsection

@section('header')
  @component('components.header')
  @endcomponent
@endsection

@section('main')
  <h1 class="main-title">Our team</h1>
  <!-- チーム紹介 -->
  <div class="main-container-team">
    <h2>members</h2>
    <div class="team-member">
      <div class="member-info">
        <img src="" alt="#" class="profile-img" />
        <div class="member-name"></div>
      </div>
      <div class="member-info">
        <img src="" alt="#" class="profile-img" />
        <div class="member-name"></div>
      </div>
      <div class="member-info">
        <img src="" alt="#" class="profile-img" />
        <div class="member-name"></div>
      </div>
      <div class="member-info">
        <img src="" alt="#" class="profile-img" />
        <div class="member-name"></div>
      </div>
      <div class="member-info">
        <img src="" alt="#" class="profile-img" />
        <div class="member-name"></div>
      </div> 
      <div class="modal-wrapper">
        <div class="modal-back"></div>
        <div class="modal">
          <div class="modal-left">
              <i class="fas fa-angle-left prevBtn"></i>
          </div>
          <div class="modal-center">
            <div class="modal-top">
              <img src="#" alt="#" class="modal-profile-img" />
              <h2>
                <p class="role"></p>
                <p class="name"></p>
                <ul class="member-sns-btn">
                  <li class="facebook-btn">
                    <a href="#">
                      <i class="fab facebook-square fa-facebook-square fa-lg"></i></a>
                  </li>
                  <li class="instagram-btn">
                    <a href="#">
                      <i class="fab fa-instagram-square fa-lg"></i></a>
                  </li>
                </ul>
              </h2>
            </div>
            <span class="modal-text"></span>
            <button class="closeBtn">close</button>
          </div>
          <div class="modal-right">
              <i class="fas fa-angle-right nextBtn"></i>
          </div>
        </div>
      </div> 
      <div class="modal-wrapper">
        <div class="modal-back"></div>
        <div class="modal">
          <div class="modal-left">
              <i class="fas fa-angle-left prevBtn"></i>
          </div>
          <div class="modal-center">
            <div class="modal-top">
              <img src="#" alt="#" class="modal-profile-img" />
              <h2>
                <p class="role"></p>
                <p class="name"></p>
                <ul class="member-sns-btn">
                  <li class="facebook-btn">
                    <a href="#">
                      <i class="fab facebook-square fa-facebook-square fa-lg"></i></a>
                  </li>
                  <li class="instagram-btn">
                    <a href="#">
                      <i class="fab fa-instagram-square fa-lg"></i></a>
                  </li>
                </ul>
              </h2>
            </div>
            <span class="modal-text"></span>
            <button class="closeBtn">close</button>
          </div>
          <div class="modal-right">
              <i class="fas fa-angle-right nextBtn"></i>
          </div>
        </div>
      </div> 
      <div class="modal-wrapper">
        <div class="modal-back"></div>
        <div class="modal">
          <div class="modal-left">
              <i class="fas fa-angle-left prevBtn"></i>
          </div>
          <div class="modal-center">
            <div class="modal-top">
              <img src="#" alt="#" class="modal-profile-img" />
              <h2>
                <p class="role"></p>
                <p class="name"></p>
                <ul class="member-sns-btn">
                  <li class="facebook-btn">
                    <a href="#">
                      <i class="fab facebook-square fa-facebook-square fa-lg"></i></a>
                  </li>
                  <li class="instagram-btn">
                    <a href="#">
                      <i class="fab fa-instagram-square fa-lg"></i></a>
                  </li>
                </ul>
              </h2>
            </div>
            <span class="modal-text"></span>
            <button class="closeBtn">close</button>
          </div>
          <div class="modal-right">
              <i class="fas fa-angle-right nextBtn"></i>
          </div>
        </div>
      </div> 
      <div class="modal-wrapper">
        <div class="modal-back"></div>
        <div class="modal">
          <div class="modal-left">
              <i class="fas fa-angle-left prevBtn"></i>
          </div>
          <div class="modal-center">
            <div class="modal-top">
              <img src="#" alt="#" class="modal-profile-img" />
              <h2>
                <p class="role"></p>
                <p class="name"></p>
                <ul class="member-sns-btn">
                  <li class="facebook-btn">
                    <a href="#">
                      <i class="fab facebook-square fa-facebook-square fa-lg"></i></a>
                  </li>
                  <li class="instagram-btn">
                    <a href="#">
                      <i class="fab fa-instagram-square fa-lg"></i></a>
                  </li>
                </ul>
              </h2>
            </div>
            <span class="modal-text"></span>
            <button class="closeBtn">close</button>
          </div>
          <div class="modal-right">
              <i class="fas fa-angle-right nextBtn"></i>
          </div>
        </div>
      </div> 
      <div class="modal-wrapper">
        <div class="modal-back"></div>
        <div class="modal">
          <div class="modal-left">
              <i class="fas fa-angle-left prevBtn"></i>
          </div>
          <div class="modal-center">
            <div class="modal-top">
              <img src="#" alt="#" class="modal-profile-img" />
              <h2>
                <p class="role"></p>
                <p class="name"></p>
                <ul class="member-sns-btn">
                  <li class="facebook-btn">
                    <a href="#">
                      <i class="fab facebook-square fa-facebook-square fa-lg"></i></a>
                  </li>
                  <li class="instagram-btn">
                    <a href="#">
                      <i class="fab fa-instagram-square fa-lg"></i></a>
                  </li>
                </ul>
              </h2>
            </div>
            <span class="modal-text"></span>
            <button class="closeBtn">close</button>
          </div>
          <div class="modal-right">
              <i class="fas fa-angle-right nextBtn"></i>
          </div>
        </div>
      </div> 
    </div><!-- .team-member -->

    <div class="team-about">
      <p>
        プログラミング初学者の私たちですが、<a
          href="https://www.youtube.com/channel/UCHxqQ8bUg5F2GW79D_DvSjQ/featured"
          target="blank">YouTubeプログラミングアカデミーチャンネル</a
        >のコミュニティ内で、学習がてらWebサービスを作ってみようというプロジェクトを立ち上げました。ジャズライブに行った人が感想を書き込んでシェアできる口コミサイトを作っています（このコロナ禍に）。
        現在、おさないさんという超絶強力なメンターと先にプロジェクトを立ち上げている先人にアドバイスを仰ぎながら５人チームでよちよち歩んでいます。
      </p>
    </div><!-- .team-about -->
    <h2>mentor</h2>
    <div class="supporter">
      <a href="https://www.youtube.com/channel/UCHxqQ8bUg5F2GW79D_DvSjQ/featured" target="blank">
        <i class="fab fa-youtube fa-5x"></i>
      </a>
      <a href="https://www.youtube.com/channel/UCHxqQ8bUg5F2GW79D_DvSjQ/featured" target="blank">
        <img src="images/programming-academy-logo.jpg" alt="ロゴ"/>
      </a>
    </div><!-- .supporter -->
  </div> <!-- .main-container-team -->

  <!-- お問い合わせフォーム -->
  <div class="main-container-contact" id="contact">
    <h1 class="main-title">お問い合わせ</h1>
    
    <form action="process" accept-charset="UTF-8" method="post" class="main-form">
      @csrf
      <div class="contact-form">
        <label class="email" for="address">メールアドレス</label>
        <input type="email" name="email" id="address" required />
        <!-- <input type="hidden" name="" value="hidden" /> -->
      </div>

      <div class="contact-form">
        <label class="account-name" for="account">お名前</label>
        <input type="text" name="name" id="account"/>
        <!-- <input type="hidden" name="" value="hidden" /> -->
      </div>
      
      <div class="contact-form">
        <label class="message" for="message-form">お問い合わせの内容</label>
        <textarea name="text" cols="40" rows="8" id="message-form" maxlength="1000" required></textarea>
        <!-- <input type="hidden" name="" value="hidden" /> -->
      </div>
      
      <div class="send-btn">
        <input type="submit" value="送信する" />
        <!-- <input type="hidden" name="" value="hidden" /> -->
      </div>
    </form>
  </div> <!-- main-container-contact -->
@endsection

@section('js')
  @env('local')
    <script type="text/javascript" src="{{ asset('js/modal_show.js') }}"></script>
  @endenv
  @production
    <script type="text/javascript" src="{{ secure_asset('js/modal_show.js') }}"></script>
  @endproduction
@endsection
  