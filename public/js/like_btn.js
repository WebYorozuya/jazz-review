'use strict';
{
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
}