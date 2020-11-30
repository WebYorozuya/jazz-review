'use strict';
{
  // クリックによりバルーンを開閉する
  const likeBtn = document.getElementsByClassName("heart");
  const balloon = document.getElementsByClassName("balloon");
  const section_likeBtn = Array.from(likeBtn);
  const section_balloon = Array.from(balloon);

  for (let i = 0; i < section_likeBtn.length; i++) {
    section_likeBtn[i].addEventListener('click', function () {
      const back = document.querySelector(".back-to-escape");
      section_balloon[i].classList.toggle('block');
      back.classList.toggle('block');

      if (section_balloon[i].classList.contains('block')) {
        back.addEventListener('click', function () {
          section_balloon[i].classList.remove('block');
          back.classList.remove('block');
        })
      }
    });
  }
}