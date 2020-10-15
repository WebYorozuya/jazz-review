'use strict';
{
  // (1) ログインユーザーのドロップダウンメニューの開閉
  // [説明]loginUserDdLabel の定義
  const loginUserDdLabel = document.querySelector(".header-loginUser-dd-label");

  // [説明]loginUserDdLabelをクリックすることでloginUserDdContent・backからShowのクラスを着脱させる関数
  function showHide(event) {
    const loginUserDdContent = document.querySelector(".header-loginUser-dd-content");
    loginUserDdContent.classList.toggle("show");
    const back = document.querySelector(".back");
    back.classList.toggle("show");
    if (loginUserDdContent.classList.contains("show")) {
      back.addEventListener('click', function () {
        loginUserDdContent.classList.remove('show');
        back.classList.remove("show");
      });
    }
  }

  loginUserDdLabel.addEventListener('click', showHide);

  // (2) mainのドロップダウンメニューの開閉
  // [説明]各クラスおよび配列の定義
  let showIcon = document.getElementsByClassName("showIcon");
  let ddContent = document.getElementsByClassName("review-dropdown");
  const section_showIcon = Array.from(showIcon);
  const section_ddContent = Array.from(ddContent);

  // [説明]showIconをクリックすることでsection_ddContent・backからshowのクラスを着脱させる関数
  // backは全画面のどこを押してもsection_ddContent
  for (let i = 0; i < section_showIcon.length; i++) {
    section_showIcon[i].addEventListener('click', function () {
      const back = document.querySelector(".back");
      section_ddContent[i].classList.toggle("show");
      back.classList.toggle("show");
      if (section_ddContent[i].classList.contains("show")) {
        back.addEventListener('click', function () {
          section_ddContent[i].classList.remove('show');
          back.classList.remove("show");
        });
      }
    });
  }

  // (3)   レビューのtextのheightの変更
  // [説明]各クラス、配列の定義
  const reviewText = document.getElementsByClassName("review-text");
  const readmoreBlock = document.getElementsByClassName("readmore-block");
  const readmoreI = document.getElementsByClassName("readmore-i");
  const readmoreBtn = document.getElementsByClassName("readmore-btn");
  const section_reviewText = Array.from(reviewText);
  const section_readmoreBlock = Array.from(readmoreBlock);
  const section_readmoreI = Array.from(readmoreI);
  const section_readmoreBtn = Array.from(readmoreBtn);

  // [説明]Reviewtextの文字数が70文字以上になった場合に｢続きを読む｣のボタンが現れる。
  for (let i = 0; i < readmoreBlock.length; i++) {
    if (section_reviewText[i].textContent.length < 70) {
      section_readmoreBlock[i].classList.add("hideBtn");
    } else {
      section_readmoreBlock[i].classList.remove("hideBtn");
    }

    // [説明]｢続きを読む｣のボタンのクリックにより、readmoreIが１８０度回転、reviewTextの高さが変わる。
    section_readmoreBlock[i].addEventListener("click", (event) => {
      section_reviewText[i].classList.toggle("reviewText-active");
      section_readmoreI[i].classList.toggle("readmoreI-active");

      // [説明]readmoreIがreadmoreI-activeのクラスを持っていた場合、readmoreBtnの記載が変わる。
      if (section_readmoreI[i].classList.contains("readmoreI-active")) {
        section_readmoreBtn[i].textContent = "もっと少なく読む";
      } else {
        section_readmoreBtn[i].textContent = "続きを読む";
      }
    })
  };

  // （4) いいねの実装
  // [説明]各クラス、配列の定義
  let likeCounter = document.querySelectorAll(".like-Counter");
  let likeBtn = document.querySelectorAll(".heart");
  const section_likeCounter = Array.from(likeCounter);
  const section_likeBtn = Array.from(likeBtn);

   // [説明]likeBtnのクリック時に数字を増減させる関数
  for (let i = 0; i < section_likeBtn.length; i++) {
    section_likeBtn[i].addEventListener("click", (event) => {
      const num = parseInt(section_likeCounter[i].textContent);
      console.log(num);
      section_likeBtn[i].classList.toggle("colorChange");
      if (section_likeBtn[i].classList.contains("colorChange")) {
        section_likeCounter[i].textContent = num + 1;
      } else {
        section_likeCounter[i].textContent = num - 1;
      }
    })
  };

  // (5)chips機能
  //チップスのjQuery
  // $(function () {
  //   $('.chips').chips();
  //   $('.chips-initial').chips({
  //     data: [{
  //       tag: 'Jazz',
  //     }, {
  //       tag: '東京',
  //     }],
  //   });
  //   $('.chips-placeholder').chips({
  //     placeholder: 'Enter a tag',
  //     secondaryPlaceholder: '+Tag',
  //   });
  // $('.chips-autocomplete').chips({
  //   autocompleteOptions: {
  //     data: {
  //       'ブルーノート東京': null,
  //       'コットンクラブ東京': null,
  //       "Kelly's大阪": null
  //     },
  //    limit: Infinity,
  //    minLength: 1
  //  }

  // document.addEventListener('DOMContentLoaded', function() {
  //   var elems = document.querySelectorAll('.chips');
  //   var instances = M.Chips.init(elems, options);
  // });
  // var instance = M.Chips.getInstance(elem);

  // instance.addChip({
  //   tag: 'chip content',
  //   //image: '', // optional
  // });

  // document.addEventListener('DOMContentLoaded', function() 
  //   var elems = document.querySelectorAll('.chips');
  //   var instances = M.Chips.init(elems, options);
  // }); */
  // var instance = M.Chips.getInstance(elem);

  //  タグ内の抽出
  // const elems = document.querySelectorAll('.chips'); //.chipクラスの要素を取得
  // const instance = M.Chips.init(elems);

  // function tagSubmit() {
  //   inputTag.innerHTML = tagName; //tagNameを<input id="tag">の値として追加
  //   //inputTag.textContent = 'france';//tagNameを<input id="tag">の値として追加
  // }

  // submit.addEventListener('submit', () => {
  //   tagSubmit();
  // });

  // (6)文字数カウント
  // [説明]idの定義
  const textarea = document.getElementById('text');

   // [説明]入力した文章の文字数をカウントする関数
  textarea.addEventListener("keydown", function (event) {
    const len = textarea.value.length;
    document.getElementById("realtimeFontLength").innerHTML = len;
  });

  //（7)モーダルを使用した見せ方


  //(8)フッターの写真のサイズを画面サイズに合わせてリサイズ
  // http://keylopment.com/faq/529/ こちらを参照
  if ($('.footer').length) {
    var imgpass = "../images/";
    // 表示させたい画像のファイル名＋拡張子を配列に格納
    var imgfile = [];
    imgfile[0] = 'trumpet.jpg';
    imgfile[1] = 'jazzclub.jpg';
    // 画像の数を元に、ランダムな数値を算出
    var n = Math.floor(Math.random() * imgfile.length);
    var bgbox = $('.footer');
    // 算出したランダムな数値の順番にいるファイル情報をbackground-imageに設定する
    bgbox.css('background-image', 'url(' + imgpass + imgfile[n] + ');');
  }

  //(9)今日の日時の表示
  window.onload = function () {
    var date = new Date()
    var year = date.getFullYear()
    var month = date.getMonth() + 1
    var day = date.getDate()

    var toTwoDigits = function (num, digit) {
      num += ''
      if (num.length < digit) {
        num = '0' + num
      }
      return num
    }

    var yyyy = toTwoDigits(year, 4)
    var mm = toTwoDigits(month, 2)
    var dd = toTwoDigits(day, 2)
    var ymd = yyyy + "-" + mm + "-" + dd;

    document.getElementById("live_date").value = ymd;
  }
  
  // (10)フッターの背景写真のランダム表示
  function changeFooterImgRandomly() {
    const imgs = [
      'url(../images/trumpet.jpg)',
      'url(../images/guitar.jpg)',
      'url(../images/piano.jpg)',
      'url(../images/saxophone.jpg)'
    ];
    const selectImg = imgs[Math.floor(Math.random() * imgs.length)];
    const footer = document.getElementById('footer');
    footer.style.backgroundImage = selectImg;
  }
  changeFooterImgRandomly();

  // (11)現在表示しているページのナビゲーションリンクをハイライト
  function highlightCurrentNavLink() {
    const currentPath = location.pathname;
    let target;
    switch (currentPath) {
      case '/':
        target = document.getElementById('newInformation');
        target.classList.add('current-page');
        break;
      case '/tags':
        target = document.getElementById('tags');
        target.classList.add('current-page');
        break;
      case '/post':
        target = document.getElementById('post');
        target.classList.add('current-page');
        break;
      case '/contact':
        target = document.getElementById('contact');
        target.classList.add('current-page');
        break;
      default:
        console.log('パスが一致しません。');
    }
  }
  highlightCurrentNavLink();

  // (12)投稿後のありがとうメッセージ
  (function () {
    'use strict';
    $(function () {
      $('.flash_message').fadeOut(5000);
    });
  })();
}