// 1.tag候補を表示し、選択されたタグをchip化する処理
// 2.存在しないタグが入力されていればエラーメッセージを表示する処理
// 3.送信時に、chip化したタグをhiddenタグにセットする処理

const tagsParent = document.getElementById('tags-parent');
const tagArea = document.getElementById('tag');
const tagErrMsg = document.getElementById('tag-error-msg');
const ul = document.getElementById('suggested-tags');
const bg = document.getElementById('suggested-tags-bg');
const postButton = document.getElementById('post-button');

// 1.tag候補を表示し、選択されたタグをchip化する処理
tagArea.addEventListener("keyup", event => {
    // 初期処理
    clearError();
    let inputtedTag = tagArea.value;

    // 入力文字がなければ表示中のtag候補を消す
    if (!inputtedTag) {
        clearSuggestedTags();
        hideSuggestedTags()
        return;
    }

    // Enterキー、または、タブキーが押下された場合はactiveなタグ候補をchip化する
    if (ul.hasChildNodes && (event.key === 'Enter' || event.ley === 'Tab')) {
        const suggestedTags = Array.from(document.getElementsByClassName('suggested-tag'));
        const index = suggestedTags.findIndex(suggestedTag =>
            suggestedTag.className.indexOf('suggested-tag-active') !== -1);
        if (index === -1) {
            return;
        }
        tagArea.value = '';
        createChip(suggestedTags[index].innerText);
        clearSuggestedTags();
        hideSuggestedTags()
        return;
    }

    // 上矢印キーが押下された場合は1つ上のタグ候補をactiveにする
    if (ul.hasChildNodes && event.key === 'ArrowUp') {
        const suggestedTags = Array.from(document.getElementsByClassName('suggested-tag'));
        const index = suggestedTags.findIndex(suggestedTag =>
            suggestedTag.className.indexOf('suggested-tag-active') !== -1);
        if (index === -1 || index === 0) {
            return;
        }
        suggestedTags[index].classList.remove('suggested-tag-active');
        suggestedTags[index - 1].classList.add('suggested-tag-active');
        return;
    }

    // 下矢印キーが押下された場合は1つ下のタグ候補をactiveにする
    if (ul.hasChildNodes && event.key === 'ArrowDown') {
        const suggestedTags = Array.from(document.getElementsByClassName('suggested-tag'));
        const index = suggestedTags.findIndex(suggestedTag =>
            suggestedTag.className.indexOf('suggested-tag-active') !== -1);
        if (index === -1 || index === suggestedTags.length - 1) {
            return;
        }
        suggestedTags[index].classList.remove('suggested-tag-active');
        suggestedTags[index + 1].classList.add('suggested-tag-active');
        return;
    }

    // tag候補をリクエストし、存在すれば、ビューに表示する
    getTags(inputtedTag).then(suggestedTags => {
        // 取得結果がなければ表示中のtag候補を消す
        // 取得中にtag入力フォームの中身がクリアされた場合も表示処理をさせないようにreturnする
        inputtedTag = tagArea.value;
        if (!Array.isArray(suggestedTags) || suggestedTags.length === 0 || !tagArea.value) {
            clearSuggestedTags();
            hideSuggestedTags()
            return;
        }
        displaySuggestedTags(suggestedTags);
    });
});

// tag候補を取得してjsonで返す
async function getTags(inputtedTag) {
    const path = '/get_suggested_tag';
    const url = path + '?' + 'tag=' + inputtedTag;
    const res = await fetch(url);
    const tags = await res.json();
    return tags;
}

// tag候補をhtmlのliタグでビューに表示する
function displaySuggestedTags(suggestedTags) {
    // タグ候補を初期化
    clearSuggestedTags();
    createModal();
    // タグ候補を表示
    ul.style.display = 'block';
    suggestedTags.forEach(tag => {
        const li = createLi(tag.tag_name);
        ul.appendChild(li);
    });
    activateHeadTag()
}

// liタグを生成する
function createLi(tagName) {
    const li = document.createElement('li');
    li.classList.add('suggested-tag');
    li.innerText = tagName;
    // hoverしたタグをactiveにする
    li.addEventListener('mouseover', () => {
        const suggestedTags = Array.from(document.getElementsByClassName('suggested-tag'));
        suggestedTags.forEach(suggestedTag => {
            suggestedTag.classList.remove('suggested-tag-active');
        });
        li.classList.add('suggested-tag-active');
    });
    // clickしたタグをchip化する
    li.addEventListener('click', event => {
        tagArea.value = '';
        createChip(tagName);
        clearSuggestedTags();
        hideSuggestedTags();
        clearError();
    });
    return li;
}

// 選択したtagが既にchip化されているかどうかチェックする
function isDuplicate(tagName) {
    let isDuplicate = false;
    const chips = Array.from(document.getElementsByClassName("chip"));
    const tags = chips.map(chip => chip.innerText);
    tags.forEach(tag => {
        if (tag === tagName) {
            isDuplicate = true;
        }
    });
    return isDuplicate;
}

// chip化する（spanタグを生成する）
function createChip(tagName) {
    if (isDuplicate(tagName)) {
        return;
    }
    const span = document.createElement('span');
    span.classList.add('chip');
    span.innerText = tagName;
    span.addEventListener('click', () => {
        span.remove();
    });
    tagsParent.insertBefore(span, tagArea);
}

// tag候補の表示・非表示を切り替える（タグ候補をモーダル化する）
function createModal() {
    bg.style.display = 'block';
    bg.addEventListener('click', () => {
        hideSuggestedTags();
    });
}

// tag候補を初期化する
function clearSuggestedTags() {
    while (ul.firstChild) {
        ul.removeChild(ul.firstChild);
    }
}

// tag候補を非表示にする
function hideSuggestedTags() {
    bg.style.display = 'none';
    ul.style.display = 'none';
}

// 先頭のタグ候補をactiveにする
function activateHeadTag() {
    const suggestedTags = Array.from(document.getElementsByClassName('suggested-tag'));
    suggestedTags[0].classList.add('suggested-tag-active');
}

// 2.存在しないタグが入力されていればエラーメッセージを表示する処理
// （フォーカスが離れたときにinputフィールドに文字列が残っていれば、
// 　存在しないタグが入力されていると判断する）
// tag候補選択時にblurになってしまうため、chip化時にtagAreaがクリアされるのを待つ
tagArea.addEventListener("blur", event => {
    window.setTimeout(() => {
        if (tagArea.value === '') {
            return;
        }
        // 入力したタグが存在していればchip化
        if (ul.hasChildNodes) {
            const suggestedTags = Array.from(document.getElementsByClassName('suggested-tag'));
            const tags = suggestedTags.map(suggestedTag => suggestedTag.innerText);
            const tagName = tags.find(tag => tag === tagArea.value);
            if (tagName) {
                tagArea.value = '';
                createChip(tagName);
                clearSuggestedTags();
                hideSuggestedTags();
                return;
            }
        }
        // 入力したタグが存在していなければエラーメッセージを表示する
        displayError()
    }, 100);
});

// エラーメッセージを表示する
function displayError() {
    tagArea.classList.add('tag-error');
    tagErrMsg.style.display = 'block';
    clearSuggestedTags();
    hideSuggestedTags();
}

// エラーメッセージをクリアする
function clearError() {
    tagArea.classList.remove('tag-error');
    tagErrMsg.style.display = 'none';
}

// 3.送信時に、chip化したタグをhiddenタグにセットする処理
postButton.addEventListener("click", function () {
    const hiddenTag = document.getElementById('hidden-tag');
    const chips = Array.from(document.getElementsByClassName("chip"));
    const tags = chips.map(chip => chip.innerText);
    const tagStr = tags.join(' ');

    hiddenTag.value = tagStr;
    document.getElementById('create-post').submit();
});
