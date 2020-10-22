'use strict';
{
  // (1) ログインユーザーのドロップダウンメニューの開閉
  // [説明]loginUserDdLabel の定義
  const loginUserDdLabel = document.querySelector(".header-loginUser-dd-label");

  // [説明]loginUserDdLabelをクリックすることでloginUserDdContent・backからShowのクラスを着脱させる関数
  function showHide(event) {
    const loginUserDdContent = document.querySelector(".header-loginUser-dd-content");
    loginUserDdContent.classList.toggle("show");
    const back = document.querySelector(".back-for-dropdown");
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