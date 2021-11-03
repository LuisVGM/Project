<?php
//$Conexion = mysqli_connect("universityprojects.ga","uproject23","Xc42fdRH9","uproject23_university_projects");
$dominio = "localhost:3306";
$nombreUsuario = "root";
$password = "";
$proyecto = "university_projects";

//localhost 3307
/*$dominio = "localhost:3307";
$nombreUsuario = "root";
$password = "RealMadrid1";
$proyecto = "id16552504_unip";*/

$Conexion = mysqli_connect($dominio,$nombreUsuario, $password, $proyecto);

//$Conexion = mysqli_connect("localhost:3306","root","","university_projects");
    /*if (!$Conexion) {
        echo 'Fallo la conexión';
    }
    else {
        echo 'Exito en la conexión';
        echo "HOLA MUNDO";
    }*/
?>