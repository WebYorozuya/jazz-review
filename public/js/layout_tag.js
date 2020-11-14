/* クリックされたらchipを削除する処理 */
const chips = Array.from(document.getElementsByClassName("chip"));
chips.forEach(chip => {
    chip.addEventListener('click', () => {
        chip.remove();
    });
});
