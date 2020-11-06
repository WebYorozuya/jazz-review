[].forEach.call(document.getElementsByClassName('tags-input'), function (el) {
  let hiddenInput = document.querySelector('.hidden-input');
  let mainInput = document.querySelector('.main-input');
  let tags = [];

  // カンマの入力によりTagを生成する
  mainInput.addEventListener('input', function () {
    let enteredTags = mainInput.value.split(',');
    if (enteredTags.length > 1) {
      enteredTags.forEach(function (t) {
        let filteredTag = filterTag(t);
        if (filteredTag.length > 0) {
          addTag(filteredTag);
        }
      });
      mainInput.value = '';
    }
  });

  // BackspaceによりTagを削除する
  mainInput.addEventListener('keydown', function (e) {
    let keyCode = e.which || e.keyCode;
    if (keyCode === 8 && mainInput.value.length === 0) {
      removeTag(tags.length - 1)
    };
  });

  function addTag(text) {
    let tag = {
      text: text,
      element: document.createElement('span'),
    };

    tag.element.classList.add('tag');
    tag.element.textContent = tag.text;

    let closeBtn = document.createElement('span');
    closeBtn.classList.add('close');
    tag.element.appendChild(closeBtn);
    closeBtn.addEventListener('click', function () {
      removeTag(tags.indexOf(tag));
    });

    tags.push(tag);

    el.insertBefore(tag.element, mainInput);

    refreshTags();
  }

  
  function removeTag(index) {
    let tag = tags[index];
    tags.splice(index, 1);
    el.removeChild(tag.element);
    refreshTags();
  }

  // hiddenInputに文字列の情報を入力
  function refreshTags() {
    let tagsList = [];
    tags.forEach(function (t) {
      tagsList.push(t.text);
      console.log(t.text);
    });
    hiddenInput.value = tagsList.join(',');
  }

  // エスケープ
  function filterTag(tag) {
    return tag.replace(/[^\w -]/g, '').trim().replace(/\W+/g, '-');
  }
});