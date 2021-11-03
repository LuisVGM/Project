//MOSTRAR EL PANEL VERTICAL
const btnToggle = document.querySelector('.toggle-btn');

btnToggle.addEventListener('click', function () {
    document.getElementById('sidebar').classList.toggle('active');
    document.getElementById('abrir').classList.toggle('active');
});

//OCULTAR PANEL VERTICAL
const btnToggleClose = document.querySelector('.toggle-btnclose');

btnToggleClose.addEventListener('click', function () {
    document.getElementById('sidebar').classList.toggle('active');
    document.getElementById('abrir').classList.toggle('active');
});
