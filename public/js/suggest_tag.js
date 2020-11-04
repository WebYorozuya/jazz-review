'use strict';
{
    const tagArea = document.getElementById('tag');
    const ul = document.getElementById('suggested-tags');
    const bg = document.getElementById('suggested-tags-bg');

    // tag入力フォームに入力された文字列を元にtag候補を表示する
    tagArea.addEventListener("keyup", event => {
        const inputtedTag = tagArea.value;
        // 入力文字がなければtag候補を消す
        if (!inputtedTag) {
            clearSuggestedTags();
            hideSuggestedTags()
            return;
        }
        // tag候補をリクエストし、存在すれば、ビューに表示する
        getTags(inputtedTag).then(suggestedTags => {
            // 取得結果がなければtag候補を消す
            if (!Array.isArray(suggestedTags) || suggestedTags.length === 0) {
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
        clearSuggestedTags();
        createModal();
        ul.style.display = 'block';
        suggestedTags.forEach(tag => {
            const li = createLi(tag);
            ul.appendChild(li);
        });
    }

    function createLi(tag) {
        const li = document.createElement('li');
        li.innerText = tag.tag_name;
        li.addEventListener('click', () => {
            console.log(li.innerText);
        });
        li.classList.add('suggested-tag');
        return li;
    }

    // tag候補の表示・非表示を切り替える（タグ候補をモーダル化する）
    function createModal() {
        bg.style.display = 'block';
        bg.addEventListener('click', () => {
            hideSuggestedTags();
            // TODO:tipsがなければ「入力されたタグは存在しません」というメッセージを出す処理を追加
        });
    }

    // tag候補の初期化
    function clearSuggestedTags() {
        while(ul.firstChild) {
            ul.removeChild(ul.firstChild);
        }
    }

    // モーダル解除
    function hideSuggestedTags() {
        bg.style.display = 'none';
        ul.style.display = 'none';
    }
}
