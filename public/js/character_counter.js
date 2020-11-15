'use strict';
{
  // (6)文字数カウント
  // [説明]idの定義
  const textarea = document.getElementById('text');
  const realtimeFontLength = document.getElementById("realtime-font-length");
  // [説明]keｙを入力したら、文字数をカウントする
  textarea.addEventListener("keyup", function () {
    const len = textarea.value.length;
    realtimeFontLength.innerHTML = len;
  })
}
