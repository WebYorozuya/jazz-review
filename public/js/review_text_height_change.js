'use strict';
{
  // レビューのテキストの高さの変更
  const reviewText = document.getElementsByClassName("review-text");
  const readmoreBlock = document.getElementsByClassName("readmore-block");
  const readmoreI = document.getElementsByClassName("readmore-i");
  const readmoreBtn = document.getElementsByClassName("readmore-btn");
  const section_reviewText = Array.from(reviewText);
  const section_readmoreBlock = Array.from(readmoreBlock);
  const section_readmoreI = Array.from(readmoreI);
  const section_readmoreBtn = Array.from(readmoreBtn);

  // テキストの高さが50以上になった場合に｢続きを読む｣のボタンが現れる。
  for (let i = 0; i < readmoreBlock.length; i++) {
    if (section_reviewText[i].clientHeight > 50) {
      section_readmoreBlock[i].classList.remove("hideBtn");
      // 50pxの高さをこえたレビューに関しては、テキストの高さをautoから50pxに変更
      section_reviewText[i].classList.add("reviewText-active");
    } else {
      section_readmoreBlock[i].classList.add("hideBtn");
    }

    // ｢続きを読む｣のボタンのクリックにより、アイコンの回転、テキスト、ボタンの記載の高さが変わる。
    section_readmoreBlock[i].addEventListener("click", (e) => {
      section_readmoreI[i].classList.toggle("readmoreI-active");

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