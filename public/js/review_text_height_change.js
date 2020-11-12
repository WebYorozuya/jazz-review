'use strict';

// (3)   レビューのtextのheightの変更
// [説明]各クラス、配列の定義
const reviewText = document.querySelectorAll(".review-text");
const readmoreBlock = document.querySelectorAll(".readmore-block");
const readmoreI = document.querySelectorAll(".readmore-i");
const readmoreBtn = document.querySelectorAll(".readmore-btn");;
const preHeight = 50;
// [説明]Reviewtextの高さが50以上になった場合に｢続きを読む｣のボタンが現れる。
for (let i = 0; i < readmoreBlock.length; i++) {
  if (reviewText[i].clientHeight > preHeight) {
    readmoreBlock[i].classList.remove("hide-btn");
    // [説明]50pxの高さをこえた投稿に関しては、Reviewtextの高さをautoから50pxに変更
    reviewText[i].classList.add("reviewtext-active");
  } else {
    readmoreBlock[i].classList.add("hide-btn");
  }

  // [説明]｢続きを読む｣のボタンのクリックにより、readmoreIが１８０度回転、reviewTextの高さが変わる。
  readmoreBlock[i].addEventListener("click", () => {
    readmoreI[i].classList.toggle("readmorei-active");
    // [説明]readmoreIがreadmoreI-activeのクラスを持っていた場合、readmoreBtnの記載が変わる。
    if (readmoreI[i].classList.contains("readmorei-active")) {
      readmoreBtn[i].textContent = "もっと少なく読む";
      reviewText[i].classList.remove("reviewtext-active");
    } else {
      readmoreBtn[i].textContent = "続きを読む";
      reviewText[i].classList.add("reviewtext-active");
    }
  })
};