/* (11)現在表示しているページのナビゲーションリンクをハイライトする処理 */
function highlightCurrentNavLink() {
    const currentPath = location.pathname;
    let target;
    switch (currentPath) {
        case '/':
            target = document.getElementById('newInformation');
            target.classList.add('current-page');
            break;
        case '/tags':
            target = document.getElementById('tags');
            target.classList.add('current-page');
            break;
        case '/post':
            target = document.getElementById('post');
            target.classList.add('current-page');
            break;
        case '/contact':
            target = document.getElementById('contact');
            target.classList.add('current-page');
            break;
    }
}
highlightCurrentNavLink();
