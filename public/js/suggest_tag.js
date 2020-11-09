'use strict';
{
    const tagsParent = document.getElementById('tags-parent');
    const tagArea = document.getElementById('tag');
    const tagErrMsg = document.getElementById('tag-error-msg');
    const ul = document.getElementById('suggested-tags');
    const bg = document.getElementById('suggested-tags-bg');
    const postButton = document.getElementById('post-button');
    let chipsed = false;

    // tag入力フォームに入力された文字列を元にtag候補を表示する
    tagArea.addEventListener("keyup", event => {
        clearError();
        let inputtedTag = tagArea.value;
        // 入力文字がなければ表示中のtag候補を消す
        if (!inputtedTag) {
            clearSuggestedTags();
            hideSuggestedTags()
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
    }

    // liタグを生成する
    function createLi(tagName) {
        const li = document.createElement('li');
        li.classList.add('suggested-tag');
        const a = createA(tagName);
        li.appendChild(a);
        li.addEventListener('click', () => {
            tagArea.value = '';
            createChip(tagName);
            clearSuggestedTags();
            hideSuggestedTags();
            clearError();
        });
        return li;
    }

    // aタグを生成する
    function createA(tagName) {
        const a = document.createElement('a');
        a.innerText = tagName;
        return a;
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

    // 存在しないタグが入力されていればエラーメッセージ
    // （フォーカスが離れたときにinputフィールドに文字列が残っていれば、
    // 　存在しないタグが入力されていると判断する）
    // tag候補選択時にblurになってしまうため、chip化時にtagAreaがクリアされるのを待つ
    tagArea.addEventListener("blur", event => {
        window.setTimeout(() => {
            if (tagArea.value === '') {
                return;
            }
            // 入力したタグが存在していればchip化
            const suggestedTags = Array.from(document.getElementsByClassName('suggested-tag'));
            const tags = suggestedTags.map(suggestedTag => suggestedTag.firstElementChild.innerText);
            tags.forEach(tag => {
                if(tag === tagArea.value) {
                    tagArea.value = '';
                    createChip(tag);
                    return;
                }
                displayError();
            });
        }, 200);
    });

    function displayError() {
        tagArea.classList.add('tag-error');
        tagErrMsg.style.display = 'block';
    }

    function clearError() {
        tagArea.classList.remove('tag-error');
        tagErrMsg.style.display = 'none';
    }


    // 送信時にchipの内容をhiddenにセット
    postButton.addEventListener("click", function () {
        const hiddenTag = document.getElementById('hidden-tag');
        const chips = Array.from(document.getElementsByClassName("chip"));
        const tags = chips.map(chip => chip.innerText);
        const tagStr = tags.join(' ');

        hiddenTag.value = tagStr;
        document.getElementById('create-post').submit();
    });
}
