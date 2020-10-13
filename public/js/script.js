

{
  'use strict';

  // @section('js')

  // (1) ログインユーザーのドロップダウンメニューの開閉(header)
  const loginUserDdLabel = document.querySelector(".header-loginUser-dd-label");

  // ShowのクラスをloginUserDdContentを着脱させる関数
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
  // @endsection

  // (2) mainのドロップダウンメニューの開閉
  let showIcon = document.getElementsByClassName("showIcon");
  let ddContent = document.getElementsByClassName("review-dropdown");
  const section_showIcon = Array.from(showIcon);
  const section_ddContent = Array.from(ddContent);

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

  // let showIcon = document.querySelectorAll(".showIcon");
  // let ddContent = document.querySelectorAll(".review-dropdown");
  // const section_showIcon = Array.from(showIcon);
  // const section_ddContent = Array.from(ddContent);

  // for (let i = 0; i < section_showIcon.length; i++) {
  //   section_showIcon[i].addEventListener("click", function(event){
  //     section_ddContent[i].classList.toggle("show");
  //   })
  // };

  // (3)   レビューのtextのheightの変更
  const Post = document.getElementsByClassName("main-newReview-lowerColumn");
  const NewReviewText = document.getElementsByClassName("main-newReviewText");
  const OpenBtn = document.getElementsByClassName("openBtn");
  const section_post = Array.from(Post);
  const section_NewReviewText = Array.from(NewReviewText);
  const section_OpenBtn = Array.from(OpenBtn);

  for (let i = 0; i < section_post.length; i++) {
    section_OpenBtn[i].addEventListener("click", () => {
      section_NewReviewText[i].classList.toggle("newReviewText-active");
      section_OpenBtn[i].classList.toggle("openBtn-active");
    })
  };

  // （4) いいねの実装

  let likeCounter = document.querySelectorAll(".like-Counter");
  let likeBtn = document.querySelectorAll(".heart");
  const section_likeCounter = Array.from(likeCounter);
  const section_likeBtn = Array.from(likeBtn);

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

  // (5)chips機能（post.blade.php,modify.blade.php)
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
    //});
  // });

  // document.addEventListener('DOMContentLoaded', function() {
  //   var elems = document.querySelectorAll('.chips');
  //   var instances = M.Chips.init(elems, options);
  // });
  // var instance = M.Chips.getInstance(elem);

  // console.log(instance);

  // instance.addChip({
  //   tag: 'chip content',
  //   //image: '', // optional
  // });

  // instance.deleteChip(3); // Delete 3rd chip.

  // instance.selectChip(2); // Select 2nd chip

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

  // innerHTMLプロパティ

  // (6)文字数カウント（post.blade.php,modify.blade.php)
  const textarea = document.getElementById('text');

  textarea.addEventListener("keydown", function(event){
    const len = textarea.value.length;
    document.getElementById("realtimeFontLength").innerHTML = len;
  });

  //（7)モーダルを使用した見せ方(contact.blade.php)
  // let modalFig = document.querySelector(".main-newReviewerFig");
  // let modalbtn = document.querySelector(".closeBtn");

  // function modelShow() {
  //   const modelSh = document.querySelector(".login-modal-wrapper");
  //   modelSh.classList.toggle("none");
  // }

  // modalFig.addEventListener('click', modelShow);
  // modalbtn.addEventListener('click', modelShow);

  //(8)フッターの写真のサイズを画面サイズに合わせてリサイズ？(ourapp.blade.php)
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

  (function () {
    'use strict';
    $(function () {
      $('.flash_message').fadeOut(5000);
    });
  })();

  //(9)今日の日時の表示（post)
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
}
