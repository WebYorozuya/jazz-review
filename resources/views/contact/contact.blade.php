@extends('layouts.ourapp')

@section('title', 'お問い合わせ')

@section('css')
<!-- Heroku -->
<link rel="stylesheet" href="{{secure_asset('css/contact.css')}}">
<!-- Local -->
<link rel="stylesheet" href="{{asset('css/contact.css')}}">
@endsection

@component('components.header')
  @slot('user')
    {{$user}}
  @endslot
@endcomponent

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
        <div class="modal">
          <div class="modal-top">
            <div class="modal-top-left">
              <i class="fas fa-angle-left prevBtn"></i>
            </div>
            <div class="modal-top-center">
              <img src="#" alt="#" class="modal-profile-img" />
              <h2>
                <p class="in-charge"></p>
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
            <div class="modal-top-right">
              <i class="fas fa-angle-right nextBtn"></i>
            </div>
          </div>
          <div class="modal-text"></div>
          <div class="modal-close">
            <button class="closeBtn">close</button>
          </div>
        </div>
      </div> 
      <div class="modal-wrapper">
        <div class="modal">
          <div class="modal-top">
            <div class="modal-top-left">
              <i class="fas fa-angle-left prevBtn"></i>
            </div>
            <div class="modal-top-center">
              <img src="#" alt="#" class="modal-profile-img" />
              <h2>
                <p class="in-charge"></p>
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
            <div class="modal-top-right">
              <i class="fas fa-angle-right nextBtn"></i>
            </div>
          </div>
          <div class="modal-text"></div>
          <div class="modal-close">
            <button class="closeBtn">close</button>
          </div>
        </div>
      </div> 
      <div class="modal-wrapper">
        <div class="modal">
          <div class="modal-top">
            <div class="modal-top-left">
              <i class="fas fa-angle-left prevBtn"></i>
            </div>
            <div class="modal-top-center">
              <img src="#" alt="#" class="modal-profile-img" />
              <h2>
                <p class="in-charge"></p>
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
            <div class="modal-top-right">
              <i class="fas fa-angle-right nextBtn"></i>
            </div>
          </div>
          <div class="modal-text"></div>
          <div class="modal-close">
            <button class="closeBtn">close</button>
          </div>
        </div>
      </div> 
      <div class="modal-wrapper">
        <div class="modal">
          <div class="modal-top">
            <div class="modal-top-left">
              <i class="fas fa-angle-left prevBtn"></i>
            </div>
            <div class="modal-top-center">
              <img src="#" alt="#" class="modal-profile-img" />
              <h2>
                <p class="in-charge"></p>
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
            <div class="modal-top-right">
              <i class="fas fa-angle-right nextBtn"></i>
            </div>
          </div>
          <div class="modal-text"></div>
          <div class="modal-close">
            <button class="closeBtn">close</button>
          </div>
        </div>
      </div> 
      <div class="modal-wrapper">
        <div class="modal">
          <div class="modal-top">
            <div class="modal-top-left">
              <i class="fas fa-angle-left prevBtn"></i>
            </div>
            <div class="modal-top-center">
              <img src="#" alt="#" class="modal-profile-img" />
              <h2>
                <p class="in-charge"></p>
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
            <div class="modal-top-right">
              <i class="fas fa-angle-right nextBtn"></i>
            </div>
          </div>
          <div class="modal-text"></div>
          <div class="modal-close">
            <button class="closeBtn">close</button>
          </div>
        </div>
      </div> 
    </div><!-- .team-member -->

    <div class="team-about">
      <p>
        プログラミング初学者の私たちですが、<a
          href="https://www.youtube.com/channel/UCHxqQ8bUg5F2GW79D_DvSjQ/featured"
          target="blank">YouTube万屋エンジニアチャンネル</a
        >のコミュニティ内で、学習がてらWebサービスを作ってみようというプロジェクトを立ち上げました。ジャズライブに行った人が感想を書き込んでシェアできる口コミサイトを作っています（このコロナ禍に）。
        現在、おさないさんという超絶強力なメンターと先にプロジェクトを立ち上げている先人にアドバイスを仰ぎながら、初心者しかいない４人のチームでよちよち歩んでいます。
      </p>
    </div>
    <h2>mentor</h2>
    <div class="supporter">
      <a href="https://www.youtube.com/channel/UCHxqQ8bUg5F2GW79D_DvSjQ/featured" target="blank">
        <i class="fab fa-youtube fa-5x"></i>
      </a>
      <a href="https://twitter.com/YorozuyaOsanai" target="blank">
        <img src="images/webyorozuya.png" alt="web万屋チャンネルロゴ"/>
      </a>
    </div>
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
        <textarea name="text" cols="40" rows="8" id="message-form" required></textarea>
        <!-- <input type="hidden" name="" value="hidden" /> -->
      </div>
      
      <div class="send-btn">
        <input type="submit" value="送信する" />
        <!-- <input type="hidden" name="" value="hidden" /> -->
      </div>
    </form>
  </div> <!-- main-container-contact -->
  <script type="text/javascript" src="{{ asset('js/modal_show.js') }}"></script>
  @endsection