'use strict';
{
  // レビューのドロップダウンメニューの開閉
  let showIcon = document.getElementsByClassName("showIcon");
  let ddContent = document.getElementsByClassName("review-dropdown");
  const section_showIcon = Array.from(showIcon);
  const section_ddContent = Array.from(ddContent);

 // クリックによるクラスの着脱により、ドロップダウンメニューを開閉する。
  for (let i = 0; i < section_showIcon.length; i++) {
    section_showIcon[i].addEventListener('click', function () {
      const back = document.querySelector(".back-to-escape");
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