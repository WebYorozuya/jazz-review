const searchButton = document.getElementById('header-search-button');
const searchText = document.getElementById('header-search-text');
const searchTextBg = document.getElementById('header-search-text-bg');
const postButton = document.getElementById('header-post');
const userButton = document.getElementById('header-usermenu');
let openStatus = false;

searchButton.addEventListener('click', () => {
    if(window.innerWidth > 700) {
        return;
    }
    searchText.style.display = 'inline';
    searchTextBg.style.display = 'block';
    postButton.style.display = 'none';
    userButton.style.display = 'none';
    openStatus = true;
});

searchTextBg.addEventListener('click', () => {
    if(openStatus === false) {
        return;
    }
    searchText.style.display = 'none';
    searchTextBg.style.display = 'none';
    postButton.style.display = 'flex';
    userButton.style.display = 'flex';
});
