'use strict';
{
  // (2) mainのドロップダウンメニューの開閉
  // [説明]各クラスおよび配列の定義
  let showIcon = document.querySelectorAll(".show-icon");
  let ddContent = document.querySelectorAll(".review-dropdown");

  // [説明]showIconをクリックすることでsection_ddContent・backからshowのクラスを着脱させる関数
  // backは全画面のどこを押してもsection_ddContent
  for (let i = 0; i < showIcon.length; i++) {
    showIcon[i].addEventListener('click', function () {
      const back = document.querySelector(".back-to-escape");
      ddContent[i].classList.toggle("show");
      back.classList.toggle("show");
      if (ddContent[i].classList.contains("show")) {
        back.addEventListener('click', function () {
          ddContent[i].classList.remove('show');
          back.classList.remove("show");
        });
      }
    });
  }
}