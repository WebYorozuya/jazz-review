'use strict';
{
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

  // [説明]Reviewtextの高さが50以上になった場合に｢続きを読む｣のボタンが現れる。
  for (let i = 0; i < readmoreBlock.length; i++) {
    if (section_reviewText[i].clientHeight > 50) {
      section_readmoreBlock[i].classList.remove("hideBtn");
      // [説明]50pxの高さをこえた投稿に関しては、Reviewtextの高さをautoから50pxに変更
      section_reviewText[i].classList.add("reviewText-active");
    } else {
      section_readmoreBlock[i].classList.add("hideBtn");
    }

    // [説明]｢続きを読む｣のボタンのクリックにより、readmoreIが１８０度回転、reviewTextの高さが変わる。
    section_readmoreBlock[i].addEventListener("click", (e) => {
      section_readmoreI[i].classList.toggle("readmoreI-active");

      // [説明]readmoreIがreadmoreI-activeのクラスを持っていた場合、readmoreBtnの記載が変わる。
      if (section_readmoreI[i].classList.contains("readmoreI-active")) {
        section_readmoreBtn[i].textContent = "もっと少なく読む";
        section_reviewText[i].classList.remove("reviewText-active");
      } else {
        section_readmoreBtn[i].textContent = "続きを読む";
        section_reviewText[i].classList.add("reviewText-active");
      }
    })
  };
}