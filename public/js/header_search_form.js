// モバイル端末時に検索フォームを消したり出したりする処理
const search = document.getElementById('header-search');
const searchButton = document.getElementById('header-search-button');
const searchText = document.getElementById('header-search-text');
const searchTextBg = document.getElementById('header-search-text-bg');
const headerRight = document.getElementById('header-right');

searchButton.addEventListener('click', () => {
    if(window.innerWidth > 800) {
        return;
    }
    search.classList.remove('header-search-min');
    search.classList.add('header-search-search-start');
    searchText.classList.add('header-search-text-searching');
    searchTextBg.classList.add('header-search-text-bg-searching');
    headerRight.classList.add('header-right-searching');
});

searchTextBg.addEventListener('click', () => {
    if(!searchText.className.indexOf('header-search-text-searching')) {
        return;
    }
    if(window.innerWidth <= 800) {
        search.classList.add('header-search-min');;
    }
    search.classList.remove('header-search-search-start');
    searchText.classList.remove('header-search-text-searching');
    searchTextBg.classList.remove('header-search-text-bg-searching');
    headerRight.classList.remove('header-right-searching');
});
