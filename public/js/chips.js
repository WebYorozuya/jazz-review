'use strict';
{
  // (5)chips機能
  //チップスのjQuery
  $(function () {
    $('.chips').chips();
    $('.chips-initial').chips({
      data: [{
        tag: 'Jazz',
      }, {
        tag: '東京',
      }],
    });
    $('.chips-placeholder').chips({
      placeholder: 'Enter a tag',
      secondaryPlaceholder: '+Tag',
    });
  // $('.chips-autocomplete').chips({
  //   autocompleteOptions: {
  //     data: {
  //       'ブルーノート東京': null,
  //       'コットンクラブ東京': null,
  //       "Kelly's大阪": null
  //     },
  //    limit: Infinity,
  //    minLength: 1
   });

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.chips');
    var instances = M.Chips.init(elems);
  });

  // instances.addChip({
  //   tag: 'chip content',
  //   //image: '', // optional
  // });

  //  タグ内の抽出
  // const elems = document.querySelectorAll('.chips'); //.chipクラスの要素を取得
  // const instance = M.Chips.init(elems);

  // function tagSubmit() {
  //   inputTag.innerHTML = tagName; //tagNameを<input id="tag">の値として追加
  //   //inputTag.textContent = 'france';//tagNameを<input id="tag">の値として追加
  // }

  // submit.addEventListener('submit', () => {
  //   tagSubmit();
  // });
}