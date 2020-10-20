'use strict';
{
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
}