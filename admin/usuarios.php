<?php 
    include_once("../Conexion.php");
    session_start();
    if(!isset($_SESSION["usuario"])){

        header('Location: inicio.php');

    }
    error_reporting(0);
    $sql = "SELECT id,nombre,apellidoPaterno,apellidoMaterno,email,modified_on,idRol FROM usuario WHERE id != ".$_SESSION['id'].";";
    $ejecutar = mysqli_query($Conexion,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!-- E L I M I N A R 
<div class="modal fade" tabindex="-1" id="eliminar">

    <div class="modal-dialog modal-sm modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <center><h4>¿Eliminar esta cuenta de usuario?</h4>
                <?php
            /*echo '<img class="img-responsive limite2" src="'.$_SESSION['foto'].'" alt="'.$_SESSION['name'].'" 
            style="border-radius: 50%;">';*/
                    echo $usuarios['nombre'];
                ?>
                </center>

            </div>

            <div class="modal-footer">

                <a class='btn btn-lg btn-danger btn-block text-white' href="sesion.php">Cerrar Sesión</a>

                <a class='btn btn-lg btn-info btn-block text-white' data-dismiss="modal">Cancelar</a>

            </div>

        </div>

    </div> 

</div>
E L I M I N A R -->
<div class="barra" style="z-index: 999;">
    <div id="sidebar">
        <div class="toggle-btn" id="abrir">
            <span>&#9776;</span>
        </div>
        <div class="toggle-btnclose" id="close">
            <span>&#10006;</span>
        </div>
        <ul>
            <li>
                <img src="../imag/logo.jpeg" alt="Logotipo" width="100px" class="logo"><br>
                <?php echo $_SESSION['name']; ?>
            </li>
            <li><a href="inicio.php">Inicio</a></li>
            <li><a href="usuarios.php">Usuarios</a></li>
            <li><a href="sesion.php">Cerrar Sesión</a></li>
        </ul>
    </div>
</div>
    <div id="contenido">
        <center><h2>University Projects</h2></center>
        <center><p>UNIP</p></center>
    </div>
    
    </div>
    <div class="contenido">
        <div class="navegador">
            <a href="#" title="Todos los Usuarios" class="boton activo" id="todos">Todos</a>&nbsp;
            <a href="#" title="Alumnos" class="boton" id="alumnos">Alumnos</a>&nbsp;
            <a href="#" title="Asesores" class="boton" id="asesores">Asesores</a><br>
            <hr>
        </div>
        
        <!-- TABLA DE TODOS LOS USUARIOS -->
        <br>
        <div class="bloque activo">
        <table class="crud">
            <tr class="columnas">
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Email</th>
                <th>Tiempo</th>
                <th>Acciones</th>
            </tr>
            <!--<tr>-->
                <?php
                    while($usuarios = mysqli_fetch_array($ejecutar)){
                        echo
                        "<tr class='celdas'>".
                        "<td>".$usuarios['nombre']."</td>
                        <td>".$usuarios['apellidoPaterno']."</td>
                        <td>".$usuarios['apellidoMaterno']."</td>
                        <td>".$usuarios['email']."</td>
                        <td>".$usuarios['modified_on']."</td>
                        <td><a href='#?id=".$usuarios['id']."' title='Eliminar'><span>&#10006;</span></a>
                        &nbsp;&nbsp;<a href='#?id=".$usuarios['id']."' title='Sanción'><span>&#128274;</span></a>
                        &nbsp;&nbsp;<a href='user/vistaUser.php?id=".$usuarios['id']."&rol=".$usuarios['idRol']."&user=".$usuarios['nombre']."' title='Ver actividad' target='_blank'>
                        <span>&#128065;</span></a></td>"
                        ."</tr>"
                        ;
                    }
                ?>
            <!--</tr>-->
        </table>
        </div>
        <div class="bloque">
            <!-- ALUMNOS -->
            <?php
                $consulta = "SELECT id,nombre,apellidoPaterno,apellidoMaterno,email,modified_on,idRol FROM usuario WHERE id != ".$_SESSION['id']." AND idRol = '1';";
                $ejecutar = mysqli_query($Conexion,$consulta);
            ?>
        <table class="crud">
            <tr class="columnas">
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Email</th>
                <th>Tiempo</th>
                <th>Acciones</th>
            </tr>
            <!--<tr>-->
                <?php
                    while($usuarios = mysqli_fetch_array($ejecutar)){
                        echo
                        "<tr class='celdas'>".
                        "<td>".$usuarios['nombre']."</td>
                        <td>".$usuarios['apellidoPaterno']."</td>
                        <td>".$usuarios['apellidoMaterno']."</td>
                        <td>".$usuarios['email']."</td>
                        <td>".$usuarios['modified_on']."</td>
                        <td>
                        
                        <a href='#?id=".$usuarios['id']."' title='Eliminar'><span>&#10006;</span></a>
                        &nbsp;&nbsp;
                        <a href='#?id=".$usuarios['id']."' title='Sanción'><span>&#128274;</span></a>
                        &nbsp;&nbsp;
                        <a href='../tipoPErfil.php?id=".$usuarios['id']."&rol=".$usuarios['idRol']."' title='Ver actividad'>
                        <span>&#128065;</span></a></td>"
                        ."</tr>"
                        ;
                    } //
                ?>
            <!--</tr>-->
        </table>
        </div>
        <div class="bloque">
            <!-- ASESORES -->
            <?php
                $consultado = "SELECT id,nombre,apellidoPaterno,apellidoMaterno,email,modified_on,idRol FROM usuario WHERE id != ".$_SESSION['id']." AND idRol = '2';";
                $ejecutar = mysqli_query($Conexion,$consultado);
            ?>
        <table class="crud">
            <tr class="columnas">
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Email</th>
                <th>Tiempo</th>
                <th>Acciones</th>
            </tr>
            <!--<tr>-->
                <?php
                    while($usuarios = mysqli_fetch_array($ejecutar)){
                        echo
                        "<tr class='celdas'>".
                        "<td>".$usuarios['nombre']."</td>
                        <td>".$usuarios['apellidoPaterno']."</td>
                        <td>".$usuarios['apellidoMaterno']."</td>
                        <td>".$usuarios['email']."</td>
                        <td>".$usuarios['modified_on']."</td>
                        <td><a href='#?id=".$usuarios['id']."' title='Eliminar'><span>&#10006;</span></a>
                        &nbsp;&nbsp;<a href='#?id=".$usuarios['id']."' title='Sanción'><span>&#128274;</span></a>
                        &nbsp;&nbsp;<a href='../tipoPErfil.php?id=".$usuarios['id']."&rol=".$usuarios['idRol']."' title='Ver actividad'>
                        <span>&#128065;</span></a></td>"
                        ."</tr>"
                        ;
                    }
                ?>
            <!--</tr>-->
        </table>
        </div>
    </div>
    <script src="script.js" charset="utf-8"></script>
    <script src="main.js" charset="utf-8"></script>
</body>
</html>