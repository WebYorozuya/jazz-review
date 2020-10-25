const searchButton = document.getElementById('header-search-button');
const searchText = document.getElementById('header-search-text');
const searchTextBg = document.getElementById('header-search-text-bg');
const headerRight = document.getElementById('header-right');

searchButton.addEventListener('click', () => {
    if(window.innerWidth > 800) {
        return;
    }
    searchText.classList.add('header-search-text-searching');
    searchTextBg.classList.add('header-search-text-bg-searching');
    headerRight.classList.add('header-right-searching');;
});

searchTextBg.addEventListener('click', () => {
    if(!searchText.className.indexOf('header-search-text-searching')) {
        return;
    }
    searchText.classList.remove('header-search-text-searching');
    searchTextBg.classList.remove('header-search-text-bg-searching');
    headerRight.classList.remove('header-right-searching');;
});
