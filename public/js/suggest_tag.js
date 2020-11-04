'use strict';
{
    const tagArea = document.getElementById('tag');
    const ul = document.getElementById('suggested-tags');
    const bg = document.getElementById('suggested-tags-bg');

    tagArea.addEventListener("keyup", event => {
        suggestedTags = getTags(tagArea.value);
        if(Array.isArray(suggestedTags) && suggestedTags.length !== 0) {
            displaySuggestedTags(suggestedTags);
        }
    });

    async function getTags(searchStr) {
        path = '/post/get_suggested_tags';
        url = path + '?' + searchStr;
        const res = await fetch(url);
        return await res.json();
    }

    function displaySuggestedTags(suggestedTags) {
        createModal();
        ul.style.display = 'block';
        suggestedTags.forEach(tag => {
            const li = document.createElement('li');
            li.innerText = tag;
            ul.appendChild(li);
        });
    }

    function createModal() {
        bg.style.display = 'block';
        bg.addEventListener('click', () => {
            bg.style.display = 'none';
            ul.style.display = 'none';
        });
    }
}
