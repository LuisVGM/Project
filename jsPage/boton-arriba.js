function irArriba(pxPantalla){
    window.addEventListener('scroll', ()=>{
        var scroll = document.documentElement.scrollTop;
        var botonArriba = document.getElementById('subir');
        if(scroll > pxPantalla){
            botonArriba.style.right = 5 + "%";
        } else {
            botonArriba.style.right = -10 + "%";
        }
    })
}

irArriba(80);