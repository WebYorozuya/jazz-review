/* フッターの背景写真のランダム表示する処理 */
function changeFooterImgRandomly() {
    const imgs = [
        'url(../images/trumpet.jpg)',
        'url(../images/guitar.jpg)',
        'url(../images/piano.jpg)',
        'url(../images/saxophone.jpg)'
    ];
    const selectImg = imgs[Math.floor(Math.random() * imgs.length)];
    const footer = document.getElementById('footer');
    footer.style.backgroundImage = selectImg;
}
changeFooterImgRandomly();
