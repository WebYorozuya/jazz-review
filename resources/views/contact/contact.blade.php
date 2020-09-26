@extends('layouts.ourapp')

@section('title', 'お問い合わせ')

@section('css')
<!-- Heroku -->
<link rel="stylesheet" href="{{secure_asset('css/contact.css')}}">
<!-- Local -->
<link rel="stylesheet" href="{{asset('css/contact.css')}}">
@endsection

@section('h1', 'Our team')

@section('main')
<!-- チーム紹介 -->
<div class="main-container-team">
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
  @endsection