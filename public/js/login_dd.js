'use strict';
{
  // ログインユーザーのドロップダウンメニューの開閉
  const loginUserDdLabel = document.querySelector(".header-loginUser-dd-label");

  // クリックによるクラスを着脱により、ドロップダウンメニューを開閉する。
  function showHide(event) {
    const loginUserDdContent = document.querySelector(".header-loginUser-dd-content");
    loginUserDdContent.classList.toggle("show");
    const back = document.querySelector(".back-to-escape");
    back.classList.toggle("show");
    if (loginUserDdContent.classList.contains("show")) {
      back.addEventListener('click', function () {
        loginUserDdContent.classList.remove('show');
        back.classList.remove("show");
      });
    }
  }

  loginUserDdLabel.addEventListener('click', showHide);
}