'use strict';

const elems = document.querySelectorAll('.chips');
const instances = M.Chips.init(elems);
const postButton = document.getElementById('post-button');

postButton.addEventListener("click", function () {

  const chips = M.Chips.getInstance(elems[0]);
  let num = "";
  const hiddenTag = document.getElementById('hidden-tag');
  const createPost = document.getElementById('create-post');

  for (let i = 0; i < chips.chipsData.length; i++) {
    const data = Object.values(chips.chipsData[i]);
    num += data + ' ';
  }
  hiddenTag.value = num;
  createPost.submit();
});
