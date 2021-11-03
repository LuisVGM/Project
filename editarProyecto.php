<?php
session_start();
require_once('Conexion.php');
$id = $_POST['idP'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$foto = $_FILES['foto']['name'];
$ruta = $_FILES['foto']['tmp_name'];
$destino = "fotosProyectos/" . $foto;
copy($ruta,$destino);
//CONSULTA DONDE CAMBIAMOS LOS VALORES
 $editar= "UPDATE proyecto SET nombre = '$nombre', descripcion = '$descripcion', foto = '$destino' WHERE id= '$id';";
 //ejecucion de la consulta
 $resultado = mysqli_query($Conexion, $editar);
 //verificacion de que la consulta se haya ejecutado correctamente
 if(!$resultado){

    echo 'Error al Editar el producto';

} else{
    if(isset($_SESSION['Rol'])){

    switch($_SESSION['Rol']){

        case 1:

            echo'<script type="text/javascript">alert("Cambios Guardados Exitosamente");

window.location.href="perfilUser.php";</script>';

        break;



        case 2:

            echo'<script type="text/javascript">alert("Cambios Guardados Exitosamente");

window.location.href="perfil.php";</script>';

        break;



        case 3:

            echo'<script type="text/javascript">alert("Cambios Guardados Exitosamente");

window.location.href="perfilUser.php";</script>';

        break;

    }

}

    //echo'<script type="text/javascript">alert("Cambios Guardados Exitosamente");

//window.location.href="perfilUser.php";</script>';

}
mysqli_close($Conexion);
?>