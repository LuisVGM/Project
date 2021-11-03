<?php
include_once('../Conexion.php');
    session_start();
    if(!isset($_SESSION["usuario"])){
        header('Location: index.php');
    }
    error_reporting(0);
    //https://articulo.mercadolibre.com.mx/MLM-556722359-xtreme-pc-gamer-radeon-vega-11-ryzen-5-ssd-240gb-monitor-fhd-_JM?quantity=1
    //DATOS DEL USUARIO
    //NUMERO DE USUARIOS(ALUMNOS,ASESORES,ADMINISTRADORES)
    //ALUMNOS
    $consulta = "SELECT id From usuario WHERE idRol = '1';";
    $resultado = mysqli_query($Conexion,$consulta);
    $alumnos = mysqli_num_rows($resultado);
    //ASESORES
    $consulta2 = "SELECT id From usuario WHERE idRol = '2';";
    $resultado2 = mysqli_query($Conexion,$consulta2);
    $asesores = mysqli_num_rows($resultado2);
    //ADMINISTRADORES
    $consulta3 = "SELECT id From usuario WHERE idRol = '3';";
    $resultado3 = mysqli_query($Conexion,$consulta3);
    $administradores = mysqli_num_rows($resultado3);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
   <?php include_once('barra.php'); ?> 
   <div class="contenido">
       <div class="fondo size">
           <div id="title">
               <h2>Usuarios Registrados</h2>
               <hr><br>
           </div>
           <div class="contenedor">
                <div>
                    <h1><?php echo $alumnos ?></h1><br>
                    <strong>Alumnos</strong>
                </div>
                <div>
                    <h1><?php echo $asesores ?></h1><br>
                    <strong>Asesores</strong>
                </div>
                <div>
                    <h1><?php echo $administradores ?></h1><br>
                    <strong>Administradores</strong>
                </div>
           <div>
       </div>
   </div>
</div></div><!-- WTF DE DONDE SALIERON 2 DIVS MÁS?? -->

   <div class="contenido">
       <div class="fondo size">
            <div id="title">
               <h2>Proyectos</h2>
               <hr><br>
           </div>
           <div class="caja">
               <?php
               $consulta = "SELECT * FROM proyecto;"; 
               $result = mysqli_query($Conexion,$consulta);
               $totalTI = mysqli_num_rows($result);
               ?>
               <div id="proyectos">
                   <h1><?php echo $totalTI ?></h1>
                   <strong>Tecnologias de la información</strong>
               </div>
               <div id="proyectos">
                   <h1><?php echo $totalTI ?></h1>
                   <strong>Contabilidad</strong>
               </div>
               <div id="proyectos">
                   <h1><?php echo $totalTI ?></h1>
                   <strong>Administración</strong>
               </div>
               <div id="proyectos">
                   <h1><?php echo $totalTI ?></h1>
                   <strong>Mantenimiento</strong>
               </div>
               <div id="proyectos">
                   <h1><?php echo $totalTI ?></h1>
                   <strong>Mecatrónica</strong>
               </div>
               <div id="proyectos">
                   <h1><?php echo $totalTI ?></h1>
                   <strong>Energías Renovables</strong>
               </div>
               <div id="proyectos">
                   <h1><?php echo $totalTI ?></h1>
                   <strong>Química</strong>
               </div>
               <div id="proyectos">
                   <h1><?php echo $totalTI ?></h1>
                   <strong>Mecánica</strong>
               </div>
           </div>
       </div>
   </div>

   <div class="contenido">
       <div class="fondo size">
           
       </div>
   </div>
   
</body>
</html>