'use strict';
{
  // 文字数カウント
  const textarea = document.getElementById('text');
  const realtimeFontLength = document.getElementById("realtimeFontLength");

  // キーを入力したら、文字数をカウントする
  textarea.addEventListener("keyup", function () {
    const len = textarea.value.length;
    realtimeFontLength.innerHTML = len;
  })
}
