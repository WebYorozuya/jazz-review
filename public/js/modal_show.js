'use strict';

//モーダルによる開発者紹介
let teamMember = {
  memberInfo: [{
    name: "kakudaisuke",
    nickname: "kaku",
    imgSrc: "images/kaku.jpeg",
    inCharge: "リーダー・デザイン担当・サーバーサイド担当",
    modaltext: "大好きでお世話になってるジャズのためのWebアプリを作れたらなと思い、このプロジェクトを立ち上げました。いろんな人の顔を思い浮かべながら制作に励んでいます！",
    twitterHref: "https://twitter.com/kakudaisuke",
    facebookHref: "https:",
    githubHref: "https://github.com/kakudaisuke",
    instagramHref: "https:",
  },
  {
    name: "tsuka",
    nickname: "tsuka",
    imgSrc: "images/tsuka.jpg",
    inCharge: "サーバーサイド担当",
    modaltext: "Webアプリに初挑戦！！Jazz Logを通して自分を含めJazzに興味持つ人が増えれば嬉しい！！",
    twitterHref: "https:",
    facebookHref: "https:",
    githubHref: "https://github.com/tuka1031",
    instagramHref: "https:",
  },
  {
    name: "ayaka",
    nickname: "ayaka",
    imgSrc: "images/ayaka.jpg",
    inCharge: "フロントエンド担当・デザイン担当",
    modaltext: "このJazz Logの作成をきっかけにJAZZに興味を持ちそうな予感♪Jazz Logを通じてJAZZを語れるようになればいいな。",
    twitterHref: "https:",
    facebookHref: "https:",
    githubHref: "https://github.com/ayakaaa182",
    instagramHref: "https://www.instagram.com/yozora223/",
  },
  {
    name: "waito",
    nickname: "waito",
    imgSrc: "images/waito.jpg",
    inCharge: "フロントエンド担当",
    modaltext: "楽しくWebアプリ作れればと思い、PJの後半から参加させてもらいました！マンガ「BLUE GIANT」が大好きなのでリアルなJAZZにも触れたいです(^^)",
    twitterHref: "https:",
    facebookHref: "https:",
    githubHref: "https://github.com/uekiGityuto",
    instagramHref: "https:",
  },
  {
    name: "mike",
    nickname: "mike",
    imgSrc: "images/mike.jpg",
    inCharge: "フロントエンド担当",
    modaltext: "ジャズは私にとって未知の世界でしたが、まさかジャズのためのWEBアプリ制作に関われることになるとは！エラーと向き合って、成長痛を楽しんで、少しずつでも日々前進します!",
    twitterHref: "https:",
    facebookHref: "https:",
    githubHref: "https://github.com/mike3104",
    instagramHref: "https:",
  },
  ]
}

const modalBack = document.querySelectorAll(".modal-back");
const memberInfo = document.querySelectorAll(".member-info");
const memberInfoImg = document.querySelectorAll(".profile-img");
const memberInfoName = document.querySelectorAll(".member-name");
const modalWrapper = document.querySelectorAll(".modal-wrapper");
const closeBtn = document.querySelectorAll(".closeBtn");
const prevBtn = document.querySelectorAll(".prevBtn");
const nextBtn = document.querySelectorAll(".nextBtn");
const twitterAtag = document.querySelectorAll('.twitter');
const facebookAtag = document.querySelectorAll('.facebook');
const githubAtag = document.querySelectorAll('.github');
const instagramAtag = document.querySelectorAll('.instagram');
const twitterBtn = document.querySelectorAll('.twitter-btn');
const facebookBtn = document.querySelectorAll('.facebook-btn');
const githubBtn = document.querySelectorAll('.github-btn');
const instagramBtn = document.querySelectorAll('.instagram-btn');

// 各空タグへの値の代入
for (let i = 0; i < memberInfo.length; i++) {
  memberInfoImg[i].src = teamMember.memberInfo[i].imgSrc;
  memberInfoName[i].innerHTML = teamMember.memberInfo[i].nickname;
  twitterAtag[i].href = teamMember.memberInfo[i].twitterHref;
  facebookAtag[i].href = teamMember.memberInfo[i].facebookHref;
  githubAtag[i].href = teamMember.memberInfo[i].githubHref;
  instagramAtag[i].href = teamMember.memberInfo[i].instagramHref;
  // リンクがされているSNSアイコンのみ表示
  if (twitterAtag[i].href !== "https:") {
    twitterBtn[i].classList.add("showBtn");
  }
  if (facebookAtag[i].href != "https:") {
    facebookBtn[i].classList.add("showBtn");
  }
  if (githubAtag[i].href != "https:") {
    githubBtn[i].classList.add("showBtn");
  }
  if (instagramAtag[i].href != "https:") {
    instagramBtn[i].classList.add("showBtn");
  }
}

for (let i = 0; i < modalWrapper.length; i++) {
  const memberInfoModalProfileImg = document.querySelectorAll(".modal-profile-img");
  const memberInfoName = document.querySelectorAll(".name");
  const memberInfoInCharge = document.querySelectorAll(".role");
  const memberInfoText = document.querySelectorAll(".modal-text");

// 各空タグへの値の代入
  memberInfoModalProfileImg[i].src = teamMember.memberInfo[i].imgSrc;
  memberInfoName[i].innerHTML = teamMember.memberInfo[i].name;
  memberInfoInCharge[i].innerHTML = teamMember.memberInfo[i].inCharge;
  memberInfoText[i].innerHTML = teamMember.memberInfo[i].modaltext;
}

// モーダルのページ移動とモーダル開閉
for (let i = 0; i < memberInfo.length; i++) {
  let index = i;
  let nextindex;
  let previndex;

  memberInfo[i].addEventListener('click', function () {
    modalWrapper[i].classList.toggle("show");
    modalBack[i].classList.toggle("spread");
    if (modalWrapper[i].classList.contains("show")) {
      closeBtn[i].addEventListener('click', function () {
        modalWrapper[i].classList.remove("show");
        modalBack[i].classList.remove("spread");
      })
      modalBack[i].addEventListener('click', function () {
        modalWrapper[i].classList.remove("show");
        modalBack[i].classList.remove("spread");
      })
    };
    if (modalWrapper[i].classList.contains("show")) {
      modalBack[i].addEventListener('click', function () {
        modalWrapper[i].classList.remove("show");
        modalBack[i].classList.remove("spread");
      });

    };
  });

  nextBtn[i].addEventListener('click', function () {
    if (index == modalWrapper.length - 1) {
      nextindex = 0;
    } else {
      nextindex = index + 1;
    }
    modalWrapper[index].classList.remove("show");
    modalBack[index].classList.remove("spread");
    modalWrapper[nextindex].classList.add("show");
    modalBack[nextindex].classList.add("spread");
    if (modalWrapper[nextindex].classList.contains("show")) {
      closeBtn[nextindex].addEventListener('click', function () {
        modalWrapper[nextindex].classList.remove("show");
      })
    };
    if (modalWrapper[nextindex].classList.contains("show")) {
      modalBack[nextindex].addEventListener('click', function () {
        modalWrapper[nextindex].classList.remove("show");
      })
    };
  });

  prevBtn[i].addEventListener('click', function () {
    if (index == 0) {
      previndex = modalWrapper.length - 1;
    } else {
      previndex = index - 1;
    }
    modalWrapper[index].classList.remove("show");
    modalBack[index].classList.remove("spread");
    modalWrapper[previndex].classList.add("show");
    modalBack[previndex].classList.add("spread");
    if (modalWrapper[previndex].classList.contains("show")) {
      closeBtn[previndex].addEventListener('click', function () {
        modalWrapper[previndex].classList.remove("show");
        modalBack[index].classList.remove("spread");
      })
    };
    if (modalWrapper[previndex].classList.contains("show")) {
      modalBack[previndex].addEventListener('click', function () {
        modalWrapper[previndex].classList.remove("show");
        modalBack[previndex].classList.remove("spread");
      })
    };
  });
}