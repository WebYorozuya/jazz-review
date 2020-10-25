const searchButton = document.getElementById('header-search-button');
const searchText = document.getElementById('header-search-text');
const searchTextBg = document.getElementById('header-search-text-bg');
const postButton = document.getElementById('header-post');
const userButton = document.getElementById('header-loginUser-dd-label');


searchButton.addEventListener('click', () => {
    searchText.style.display = 'inline';
    searchTextBg.style.display = 'block';
    postButton.style.display = 'none';
    userButton.style.display = 'none';
});

searchTextBg.addEventListener('click', () => {
    searchText.style.display = 'none';
    searchTextBg.style.display = 'none';
    postButton.style.display = 'inline';
    userButton.style.display = 'inline';
});
