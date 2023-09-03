const modeToggleBtn = document.getElementById('mode-toggle');
const body = document.body;

modeToggleBtn.addEventListener('click', () => {
    body.classList.toggle('light-mode');

});

