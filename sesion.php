<?php
    include 'Conexion.php';
    error_reporting(~E_ALL);
    //RETOMAMOS LA SESIÓN
    session_start();
    if(!$Conexion)
	{
		echo 'alert("Error al conectarse a la BD");';
	}else{
    $idU=$_SESSION['id'];
    $sql = "UPDATE usuario SET estado='0' WHERE id='$idU'";
	$result= mysqli_query($Conexion,$sql);
    //DESELECCIONAMOS LA SESIÓN
    session_unset();
    //DESTRUIMOS LA SESIÓN
    session_destroy();
    //REDIRIGIR AL INDEX
    header('Location: index.html');
    }
?>