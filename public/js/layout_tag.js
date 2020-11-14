// クリックされたらchipを削除する
const chips = Array.from(document.getElementsByClassName("chip"));
chips.forEach(chip => {
    chip.addEventListener('click', () => {
        chip.remove();
    });
});
