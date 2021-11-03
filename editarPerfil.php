<?php

    session_start();

    include('Conexion.php');

    $Id =$_POST['newid'];

    $idNivel = $_POST['nivelA'];

    $idCuatri = $_POST['cuatrimestre'];

    $idGrupo = $_POST['grupo'];

    /*$primerN = $_POST['nombre'];

    $apellidoP = $_POST['apellidoPaterno'];

    $apellidoM = $_POST['apellidoMaterno'];*/

    $esp = $_POST['especialidad'];

    

    $editar = "UPDATE usuario SET nombre='$primerN', apellidoPaterno='$apellidoP',

     apellidoMaterno='$apellidoM' WHERE id = '$Id';";

 

    $resultado = mysqli_query($Conexion, $editar) or die("Error: ".mysql_error);



    $editar = "UPDATE alumno SET idEspecialidad='$esp' WHERE idUsuario = '$Id';";

 

    $resultado = mysqli_query($Conexion, $editar) or die("Error: ".mysql_error);

 

    if(!$resultado){

        echo 'Error al Editar el producto';

    } else{if(isset($_SESSION['Rol'])){

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