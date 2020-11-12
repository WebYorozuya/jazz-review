'use strict';
{
  const likeBtn = document.querySelectorAll(".heart");
  const balloon = document.querySelectorAll(".balloon");


  // [説明]showIconをクリックすることでsection_ddContent・backからshowのクラスを着脱させる関数
  // backは全画面のどこを押してもsection_ddContent
  for (let i = 0; i < likeBtn.length; i++) {
    likeBtn[i].addEventListener('click', function () {
      const back = document.querySelector(".back-to-escape");
      balloon[i].classList.toggle('block');
      back.classList.toggle('block');

      if (balloon[i].classList.contains('block')) {
        back.addEventListener('click', function () {
          balloon[i].classList.remove('block');
          back.classList.remove('block');
        })
      }
    });
  }
}