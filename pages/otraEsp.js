function otraEspecialidad(){
    let especialidad = document.getElementById("especialidad");
    let otro = especialidad.nodeValue;
    document.getElementById("otraEsp").innerHTML =  `selecciono ${otro}.`;
}