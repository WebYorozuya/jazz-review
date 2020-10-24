'use strict';
{
  var elems = document.querySelectorAll('.chips');
  var createPost = document.getElementById('create-post');
  var postButton = document.getElementById('post-button');
  var instances = M.Chips.init(elems);

  $(function () {
    $('.chips').chips();
    $('.chips-placeholder').chips({
      placeholder: 'Enter a tag',
      secondaryPlaceholder: '+Tag',
    });
  });

  const chips = instances[0];

  postButton.addEventListener("click", function () {
    var Tag = document.getElementById('tag');
    Tag.innerHTML = chips.chipsData.forEach(tag => Object.values(tag));
    createPost.submit();
    // chips.chipsData.forEach(tag => console.log(Object.values(tag)));
  });
}