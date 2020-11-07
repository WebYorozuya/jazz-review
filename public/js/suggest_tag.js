'use strict';
{
    const tagArea = document.getElementById('tag');
    const ul = document.getElementById('suggested-tags');
    const bg = document.getElementById('suggested-tags-bg');

    // tag入力フォームに入力された文字列を元にtag候補を表示する
    tagArea.addEventListener("keyup", event => {
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
            const li = createLi(tag);
            ul.appendChild(li);
        });
    }

    function createLi(tag) {
        const li = document.createElement('li');
        li.classList.add('suggested-tag');
        li.innerText = tag.tag_name;
        li.addEventListener('click', () => {
            console.log(li.innerText);
            // TODO: chips化する
        });
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

    // tag候補の初期化する
    function clearSuggestedTags() {
        while(ul.firstChild) {
            ul.removeChild(ul.firstChild);
        }
    }

    // tag候補を非表示にする
    function hideSuggestedTags() {
        bg.style.display = 'none';
        ul.style.display = 'none';
    }
}
