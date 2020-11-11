// chip化されているタグをclick時に消す処理
'use strict';
{
    const chips = Array.from(document.getElementsByClassName("chip"));
    chips.forEach(chip => {
        chip.addEventListener('click', () => {
            chip.remove();
        });
    });
}
