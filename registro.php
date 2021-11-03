<?php
include_once('Conexion.php');
error_reporting(~E_ALL);
//variables
$primerN = $_POST['nombre'];
$apellidoP = $_POST['apellidopaterno'];
$apellidoM = $_POST['apellidomaterno'];
$Correo = $_POST['inputEmail'];
$Clave = sha1($_POST['inputPassword']);
$nivelA = $_POST['nivel'];
$Area = $_POST['area'];
$Cuatri = $_POST['cuatrimestre'];
$Grup = $_POST['grupo'];
$Matri = $_POST['matricula'];
$Prom = $_POST['promedio'];
$Experto = $_POST['especialidad'];
$rol=1;
$var=1;
$img = "fotos/perfil.png";
$portada = "portada/mex-fet.jpg";

//consulta INSERT
$insert = "INSERT INTO usuario(nombre,apellidoPaterno,apellidoMaterno,email,contraseña,idRol,foto,portada) 
VALUES ('$primerN','$apellidoP','$apellidoM','$Correo','$Clave','$rol','$img','$portada');";

//ejecutar mysqli_query
$consulta = mysqli_query($Conexion, $insert);
if (!$consulta){
    $var=0;
}
//obtener id del usuario
$select= "SELECT id FROM usuario WHERE email= '$Correo' AND contraseña= '$Clave'";
$ejecutar= mysqli_query($Conexion,$select);
$tabla= mysqli_fetch_array($ejecutar);
$idU= $tabla['id'];

//consulta 2 INSERT
$insert2= "INSERT INTO alumno(matricula,idPromedio,idGrupo,idEspecialidad,idNAcademico,idCuatrimestre,idArea,idUsuario) 
VALUES ('$Matri','$Prom','$Grup','$Experto','$nivelA','$Cuatri','$Area','$idU')";
//ejecutar 
$consulta2 = mysqli_query($Conexion, $insert2);

//verificar
/*if (!$consulta2){
    echo'<script type="text/javascript">alert("Error");
    window.location.href="pages/registroA.php";</script>';
}else{
    header('Location: iniciosesion.html');
}*/
if (!$consulta2){
    /*echo'<script type="text/javascript">alert("Error al registrar el usuario");
    window.location.href="pages/registro.php";</script>';*/
    echo $var."<br>";
    echo $insert."<br>";
    echo $select."<br>";
    echo $insert2."<br>";
}else{
    echo'<script type="text/javascript">alert("Haz sido registrado correctamente, continua iniciando sesión");
    window.location.href="diseño/login.html";</script>';
}
//cerrar la conexion
mysqli_close($Conexion);
?>