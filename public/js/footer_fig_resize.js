'use strict';
{
  //フッターの写真のサイズを画面サイズに合わせてリサイズ
  // http://keylopment.com/faq/529/ こちらを参照
  if ($('.footer').length) {
    var imgpass = "../images/";
    // 表示させたい画像のファイル名＋拡張子を配列に格納
    var imgfile = [];
    imgfile[0] = 'trumpet.jpg';
    imgfile[1] = 'jazzclub.jpg';
    // 画像の数を元に、ランダムな数値を算出
    var n = Math.floor(Math.random() * imgfile.length);
    var bgbox = $('.footer');
    // 算出したランダムな数値の順番にいるファイル情報をbackground-imageに設定する
    bgbox.css('background-image', 'url(' + imgpass + imgfile[n] + ');');
  }
}