<?php
include 'Conexion.php';
error_reporting(~E_ALL);
//variables
$primerN = $_POST['nombre'];
$apellidoP = $_POST['apellidopaterno'];
$apellidoM = $_POST['apellidomaterno'];
$Correo = $_POST['inputEmail'];
$Clave = sha1($_POST['inputPassword']);
$Area = $_POST['area'];
$Experto = $_POST['especialidad'];
$materia = $_POST['asignatura'];
$nivel = $_POST['nivel'];
$rol=2;
$estado=0;
$img = "fotos/perfil.png";
$portada = "portada/mex-fet.jpg";

//consulta INSERT
$insert = "INSERT INTO usuario(nombre,apellidoPaterno,apellidoMaterno,email,contraseña,idRol,estado,foto,portada) 
VALUES ('$primerN','$apellidoP','$apellidoM','$Correo','$Clave','$rol','$img','$portada');";
//ejecutar 
$consulta = mysqli_query($Conexion, $insert);

$select= "SELECT id FROM usuario WHERE email= '$Correo' AND contraseña= '$Clave';";
$ejecutar= mysqli_query($Conexion,$select);
$tabla= mysqli_fetch_array($ejecutar);
$idU= $tabla['id'];

//consulta 2 INSERT
$insert3= "INSERT INTO maestro(idEspecialidad,idUsuario,idArea,idNA) 
VALUES ('$Experto','$idU','$Area','$nivel')";
//ejecutar 
$consulta = mysqli_query($Conexion, $insert3);

//RECUPERAR DEL ARRAY LAS ASIGNATURAS UTILIZADAS QUE SON MÁXIMO 4
for ($i=0;$i<count($materia);$i++){
    if($i==0){
        $asig1 = $materia[$i];
    }
    if($i==1){
        $asig2 = $materia[$i];
    }
    if($i==2){
        $asig3 = $materia[$i];
    }
    if($i==3){
        $asig4 = $materia[$i];
    }
}
//INSERTAR LAS ASIGNATURAS CORRESPONDIENTES
if($asig1 != ""){
    $insert2 = "UPDATE maestro SET idAsignatura='$asig1' WHERE idUsuario='$idU'";
    $consulta = mysqli_query($Conexion, $insert2);
}

if($asig2 != ""){
    $insert2 = "UPDATE maestro SET idAsignatura2='$asig2' WHERE idUsuario='$idU'";
    $consulta = mysqli_query($Conexion, $insert2);
}

if($asig3 != ""){
    $insert2 = "UPDATE maestro SET idAsignatura3='$asig3' WHERE idUsuario='$idU'";
    $consulta = mysqli_query($Conexion, $insert2);
}

if($asig4 != ""){
    $insert2 = "UPDATE maestro SET idAsignatura4='$asig4' WHERE idUsuario='$idU'";
    $consulta = mysqli_query($Conexion, $insert2);
}

//verificar
if (!$consulta){
    echo'<script type="text/javascript">alert("Error al registrar el usuario");
    window.location.href="pages/registroDocente.php";</script>';
}else{
    echo'<script type="text/javascript">alert("Haz sido registrado correctamente, continua iniciando sesión");
    window.location.href="iniciosesion.html";</script>';
}
//cerrar la conexion
mysqli_close($Conexion);
?>