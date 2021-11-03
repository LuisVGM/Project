const boton = document.querySelectorAll('.boton');
const bloque = document.querySelectorAll('.bloque');

boton.forEach( (cadaBtn , i)=>{
    boton[i].addEventListener('click',()=>{

        boton.forEach( (CadaBtn , i)=>{
            boton[i].classList.remove('activo')
            bloque[i].classList.remove('activo')
        })

        boton[i].classList.add('activo')
        bloque[i].classList.add('activo')
    })
})