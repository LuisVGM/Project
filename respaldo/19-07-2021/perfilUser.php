<?php

    //RETOMAMOS LA SESION QUE ESTA INICIADA

    session_start();

    //SI NO HAY INICIADA UNA SESION REDIRIGIRA AL INDEX

    if(!isset($_SESSION["usuario"])){

        header('Location: index.php');

    }
    error_reporting(0);

    $back = 0;
    
    include_once('Conexion.php');
    include_once('inactividad.php');
    include_once('refresh.php');

?>

<!DOCTYPE html>

<html lang="en">



<head>



  <meta charset="utf-8">

  <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="">

  <meta name="author" content="">



  <title>Perfil</title>

    

  <!-- Bootstrap core CSS -->

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    

  <!-- Custom styles for this template -->

  <link href="css/modern-business.css" rel="stylesheet">



  <link href="css/blog.rtl.css" rel="stylesheet">



</head>

<style>

  .fond {

    background-image: url(imag/mex-fet.jpg);

  }

  

  #editaR{

    margin-top: 90px;

  }


  .ventana{

    /*height: 130px;*/

    width: 120px;

    max-height: 160px;

    max-width: 130px;

  }

    

  .text-c{

    color: #FFFFFF;

    font-size: .9em;

    text-align: center;

    position: relative;

    top: 50%;

    left: 50%;

    transform: translateX(-50%) translateY(-50%);

  }



  .auto-texto{

    word-wrap: break-word;

  }

  .imgR{

     height: 100px;

    width: 110px;

    max-height: 160px;

    max-width: 130px;

  }

  .limite{
    max-width: 100px;
    max-height: 150px;
  }
  .esp{
    padding-left: 30px;
    padding-top: 20px;
    padding-block-end: 20px;
    padding-right: 20px;
  }
  .posicion{
    position: relative;
    top: 40%;
    left: 60%;
    transform: translateX(-100%) translateY(-100%);
  }
  .right{
    text-align: right;
  }
  .izquierda{
    float: left;
  }
  .margenes{
    padding-top: 5px;
    padding-left: 5px;
    padding-right: 5px;
    padding-block-end: 5px;
  }
  .pad{
    padding-left: 20px;
  }
  .tarjeta{
    padding-top: 15px;
    padding-left: 30px;
    padding-right: 30px;
    padding-block-end: 15px;
  }
</style>

<script type="text/javascript">
 function tiempoReal() {
    var tabla = $.ajax({
      url: 'recibidas.php',
      dataType: 'text',
      async: false,
    }).responseText;

    document.getElementById("notif").innerHTML = tabla;
  } 
  setInterval(tiempoReal, 1000);
</script>

<body>


<?php

    

    

    /*$usr = ;

    $pass = ;*/

    $_SESSION['editarP'] = 1;

    $sql ="SELECT * FROM usuario WHERE email='".$_SESSION['usuario']."' AND contraseña='".$_SESSION['contraseña']."';";

    $result= mysqli_query($Conexion,$sql);

    while ($tabla= mysqli_fetch_array($result)) {

        $idUser=$tabla['id'];

        $_SESSION['name']=$tabla['nombre'];

        $_SESSION['apellidoP']=$tabla['apellidoPaterno'];

        $_SESSION['apellidoM']=$tabla['apellidoMaterno'];
        
        $imagen = $tabla['foto'];

        $_SESSION['foto'] = $imagen;

        //TABLA ALUMNO

        $sql1 ="SELECT * FROM alumno WHERE idUsuario ='".$_SESSION['id']."'";

        $result= mysqli_query($Conexion,$sql1);

        while ($alumno= mysqli_fetch_array($result)) {

            $idAlumno=$alumno['id'];

            $idA=$alumno['idArea'];

            $idNA=$alumno['idNAcademico'];

            $idC=$alumno['idCuatrimestre'];

            $idP=$alumno['idProyecto'];

            $idE=$alumno['idEspecialidad'];

            $idG=$alumno['idGrupo'];

            $idProm=$alumno['idPromedio'];

            //TABLA AREA

            $sql2 ="SELECT * FROM area WHERE id ='$idA'";

            $result2= mysqli_query($Conexion,$sql2);

            while ($area= mysqli_fetch_array($result2)) {

                $sql3 ="SELECT * FROM cuatrimestre WHERE id ='$idC'";

                $result= mysqli_query($Conexion,$sql3);

                while ($cuatri= mysqli_fetch_array($result)) {

                    $sql4 ="SELECT * FROM nivelacademico WHERE id ='$idNA'";

                    $result= mysqli_query($Conexion,$sql4);

                    while ($nivel= mysqli_fetch_array($result)) {

                      $sql5 ="SELECT * FROM especialidad WHERE id ='$idE'";

                      $result= mysqli_query($Conexion,$sql5);

                      while ($especialidad= mysqli_fetch_array($result)) {

                        $sql6 ="SELECT * FROM promedio WHERE id ='$idProm'";

                        $result= mysqli_query($Conexion,$sql6);

                        while ($promedio= mysqli_fetch_array($result)) {

                          $sql7 ="SELECT * FROM grupo WHERE id ='$idG'";

                        $result= mysqli_query($Conexion,$sql7);

                        while ($grupo= mysqli_fetch_array($result)) {

?>

  <!-- Navigation -->
  <?php
  include_once('header.php');
  ?>
  <!-- Page Content -->

  <div class="container">



    <!-- Page Heading/Breadcrumbs 

    <h1 class="mt-4 mb-3">Perfil</h1>-->

    <br/><br/>

    <!-- Image Header -->

    <div class="container">



      <!-- TI -->

      <div class="card mb-4 fond">

        <div class="card-body">

          <center><h2 class="card-title"><?php echo $_SESSION['name'] ." ". $_SESSION['apellidoP'] ." ". $_SESSION['apellidoM']; ?></h2>
          <!--<img class="img-responsive" src="imag/perfil.png" alt="" width="150" height="150">-->
          <?php
          echo '<img class="img-responsive limite" src="'.$imagen.'" alt="" style="border-radius: 50%;"<br/>';
          /*$archivo = "SELECT * FROM foto WHERE id = '4'";
          $result = mysqli_query($Conexion,$archivo);
          while($valentin = mysqli_fetch_array($result)){//$grupo= mysqli_fetch_array($result)
            echo '<img class="img-responsive" src="'.$valentin["direccion"].'" alt="" width="100" height="150" 
            style="border-radius: 10%;"<br/>';
          }*/
          //

          ?>

        </center>

        </div>

      </div>

      

    <!-- Marketing Icons Section -->

    <main class="container">

    <div class="row mb-2">

    <div class="col-md-6">

      <div class="row g-0 border rounded overflow-hidden  mb-4 shadow-sm position-relative">

        <div class="col p-4 d-flex flex-column position-static">

          <strong class="d-inline-block mb-2 text-success">Correo Electronico</strong>

          <h6 class="mb-0 auto-texto"><?php echo $_SESSION['usuario'] ?></h6>

        </div>

        <div class="d-none d-lg-block">

          <!--<svg class="bd-placeholder-img" width="110" height="110" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: HOLA" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Hola</text></svg>-->

          

          <img src="https://www.pngkey.com/png/detail/333-3330465_imagen-de-el-correo.png" class="imgR">

        </div>

      </div>

    </div>

    <div class="col-md-6">

      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm position-relative">

        <div class="col p-4 d-flex flex-column position-static">

          <strong class="d-inline-block mb-2 text-success">Matricula</strong>

          <h6 class="mb-0"><?php echo $alumno['matricula'] ?></h6>

        </div>

        <div class="d-lg-block">

            <img src="https://colebioqsf2.org/colebioq_control/files/novedades/3_MATRICULA.png" class="imgR">

        </div>

      </div>

    </div>

  </div>

  <!-- SEGUNDA SECCION-->

    <div class="row mb-2">

    <div class="col-md-6">

      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm position-relative">

        <div class="col p-4 d-flex flex-column position-static">

          <strong class="d-inline-block mb-2 text-success">Nivel Academico</strong>

          <h6 class="mb-0"><?php echo $nivel['descripcion'] ?></h6>

        </div>

        <div  class="ventana" style="background-color: #005F40!important">

          <?php echo "<h6 class='text-c'>".$nivel['nivel']."</h6>" ?>

            <!--<img src="https://www.pngkey.com/png/detail/333-3330465_imagen-de-el-correo.png" width="110" height="110">-->

        </div>

      </div>

    </div>

    <div class="col-md-6">

      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm position-relative">

        <div class="col p-4 d-flex flex-column position-static">

          <strong class="d-inline-block mb-2 text-success">Especialidad</strong>

          <h6 class="mb-0"><?php echo $especialidad['especialidad'] ?></h6>

        </div>

        <div class="d-lg-block">

          <img src="https://bestbarnone.drinksenseab.ca/wp-content/themes/best-bar-none/images/program-icon-stay.png" class="imgR">



        </div>

      </div>

    </div>

  </div>

  <!-- TERCERA SECCION-->

  <div class="row mb-2">

    <div class="col-md-6">

      <div class="row g-0 border rounded overflow-hidden  mb-4 shadow-sm position-relative">

        <div class="col p-4 d-flex flex-column position-static">

          <strong class="d-inline-block mb-2 text-success">Cuatrimestre</strong>

          <h6 class="mb-0"><?php echo $cuatri['nombre'] ?></h6>

        </div>

        <div  class="ventana" style="background-color: #005F40!important">

          <?php echo "<h6 class='text-c'>".$cuatri['numero']."</h6>" ?>

            <!--<img src="https://www.pngkey.com/png/detail/333-3330465_imagen-de-el-correo.png" width="110" height="110">-->

        </div>

      </div>

    </div>

    <div class="col-md-6">

      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm position-relative">

        <div class="col p-4 d-flex flex-column position-static">

          <strong class="d-inline-block mb-2 text-success">Área</strong>

          <h6 class="mb-0"><?php echo $area['nombreArea'] ?></h6>

        </div>

        <div class="ventana" style="background-color: #005F40!important">

            <?php echo "<h6 class='text-c'>".$area['descripcion']."</h6>" ?>

        </div>

            <!--<img src="https://colebioqsf2.org/colebioq_control/files/novedades/3_MATRICULA.png" width="110" height="110">-->



      </div>

    </div>

    

  </div>

  <!-- SEGUNDA SECCION-->

    <div class="row mb-2">

        

    <div class="col-md-6">

      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm position-relative">

        <div class="col p-4 d-flex flex-column position-static">

          <strong class="d-inline-block mb-2 text-success">Grupo</strong>

          <h6 class="mb-0"><?php echo $grupo['grupo'] ?></h6>

        </div>

        <div class="d-lg-block">

        <img src="https://png.pngtree.com/element_origin_min_pic/00/00/06/12575cb97a22f0f.jpg" class="imgR">



        </div>

      </div>

    </div>

    <div class="col-md-6">

      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm position-relative">

        <div class="col p-4 d-flex flex-column position-static">

          <strong class="d-inline-block mb-2 text-success">Promedio</strong>

          <h6 class="mb-0"><?php echo $promedio['promedio'] ?></h6>

        </div>

        <div class="d-lg-block">

          <img src="https://www.oposicionesprl.com/wp-content/uploads/2019/07/calificaciones.jpg" class="imgR">



        </div>

      </div>

    </div>

    </div>

    </main>



    <!-- MODAL EDITAR PERFIL -->

    <div class="modal fade" tabindex="-1" id="editar">

      <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

          <div class="modal-header">

            <h4>Editar Perfil</h4>

            <button class="close" data-dismiss="modal">&times;</button>

          </div>

          <div class="modal-body"> 

            <form class="form-signin" name="sentMessage" id="contactForm" method="POST" action="editarPerfil.php">

            <h6>Nombre</h6>

            <input type="hidden" name="newid" id="newid" value="<?php echo $tabla['id']; ?>">

            <input type="hidden" name="idE" id="idE" value="<?php echo $alumno['idEspecialidad']; ?>">

            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre (s)" value="<?php echo $tabla['nombre']; ?>">

            <h6>Apellido Paterno</h6>

            <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" placeholder="Apellido Paterno" value="<?php echo $tabla['apellidoPaterno']; ?>">

            <h6>Apellido Materno</h6>

            <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" placeholder="Apellido Materno" value="<?php echo $tabla['apellidoMaterno']; ?>">

            <h6>Especialidad</h6>

          <select name="especialidad" id="especialidad" class="form-control"  required>

            <option value="">...</option>

            <?php

                $select5="SELECT * FROM especialidad";

                $ejecutar= mysqli_query($Conexion,$select5);

                while ($especialidad= mysqli_fetch_array($ejecutar)) {

            ?>

                <option value=<?php echo $especialidad['id'] ?> > <?php echo $especialidad['especialidad'] ?></option>

            <?php } ?>

          </select>
          
          </div>

          <div class="modal-footer">

          <!--<?php echo "<a href='editarPerfil.php?id=".$tabla['id']."' class='btn btn-lg btn-success'>Guardar Cambios</a>" ?>-->

          <button class="btn btn-lg btn-success" type="submit">Guardar Cambios</button>

            <a class='btn btn-lg btn-white text-black' data-dismiss="modal">Cancelar</a></form>

          </div>

        </div>

      </div> 

    </div>

    <!-- Nuevo Proyecto -->

    <div class="modal fade" tabindex="-1" id="project">

      <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

          <div class="modal-header">

            <h4>Agregar Nuevo Proyecto</h4>

            <button class="close" data-dismiss="modal">&times;</button>

          </div>

          <div class="modal-body"> 

            <form class="form-signin" name="sentMessage" id="contactForm" method="POST" action="nuevoP.php" enctype="multipart/form-data">

            <h6>Nombre</h6>

            <input type="hidden" name="newid" id="newid" value="<?php echo $tabla['id']; ?>">

            <input type="text" class="form-control" id="nombreP" name="nombreP" placeholder="Nombre del proyecto"><br/>

            <h6>Descripción del Proyecto</h6>

            <textarea class="form-control" name="descripcion" id="descripcion" cols="47" rows="5" placeholder="Redacta tu descripción" required></textarea><br/>

            <input type="file" name="foto" id="foto">

          </div>

          <div class="modal-footer">

          <!--<?php echo "<a href='editarPerfil.php?id=".$tabla['id']."' class='btn btn-lg btn-success'>Guardar Cambios</a>" ?>-->

          <button class="btn btn-lg btn-success" type="submit">Guardar Proyecto</button></form>

          </div>

        </div>

      </div> 

    </div>
    
    

    <!--MODAL EDITAR FOTO PERFIL-->
    <div class="modal fade" tabindex="-1" id="fotoPerfil">

      <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

          <div class="modal-header">

            <h4>Cambiar foto de Perfil</h4>

            <button class="close" data-dismiss="modal">&times;</button>

          </div>

          <div class="modal-body"> 

            <form class="form-signin" name="sentMessage" id="contactForm" method="POST" action="cambioFoto.php" enctype="multipart/form-data">

            <input type="file" name="foto" id="foto"><br/><br/>
          <center><button class="btn btn-lg btn-success" type="submit">Guardar Cambio</button></form></center>

          </div>

        </div>

      </div> 

    </div>
    <?php

                    }

                  }

                }

              }

          }

        }

      }



      $sql ="SELECT * FROM proyecto WHERE id ='$idP'";

                    $result= mysqli_query($Conexion,$sql);

                    $filas=mysqli_num_rows($result);

                    if($filas > 0){

                    while ($trabajo= mysqli_fetch_array($result)) {
                      $_SESSION['proyecto'] = $trabajo['id'];
                      $_SESSION['unidos'] = $trabajo['miembros'];
    ?>

    <!-- MODAL INTEGRANTES DE PROYECTO-->
    <div class="modal fade" tabindex="-1" id="INTEGRANTES">

      <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

          <div class="modal-header">

            <h4>Integrantes de <?php echo $trabajo['nombre'] ?></h4>

            <button class="close" data-dismiss="modal">&times;</button>

          </div>

          <div class="modal-body"> 
                      <!-- INTEGRANTES DEL EQUIPO -->
            <?php 
              $consult = "SELECT * FROM alumno WHERE idProyecto = '". $trabajo['id'] ."';";
              $result= mysqli_query($Conexion,$consult);
              $filas=mysqli_num_rows($result);
              if($filas > 0){  
                //SACAMOS INFO DE LA TABLA ALUMNO
                while ($trabajo1= mysqli_fetch_array($result)) {
                  $users = "SELECT * FROM usuario WHERE id = '". $trabajo1['idUsuario'] ."';";
                  $resulta= mysqli_query($Conexion,$users);
                  $filas1=mysqli_num_rows($resulta);
                  if($filas1 > 0){ 
                    while ($miembros= mysqli_fetch_array($resulta)) {
                      if($trabajo['idLider'] == $trabajo1['idUsuario']){
                        //echo $trabajo1['matricula'];
                      //DIV DE LIDER DE PROYECTO?>
                        <div class='card bordes'>
                          <div class=''>
                          <!--<div class='izquierda margenes'><img src='imag/perfil.png' alt='' class='imagen'></div>-->
                            <div class='izquierda margenes'>
                              <?php
                                echo '<img class="img-responsive" src="'.$miembros['foto'].'" alt="" style="border-radius: 10%; max-hight: 5%; max-width: 5%;">';
                              ?>
                              <strong class=''>
                                <?php echo "<a style='color:black;' href='tipoPErfil.php?id=".$miembros['id']."'>".$miembros['nombre']." ".$miembros['apellidoPaterno']." ".$miembros['apellidoMaterno']."</a>" ?> 
                              </strong>&nbsp;&nbsp;
                              <button type="button" class="btn btn-outline-success btn-sm" disabled>Líder</button>
                                <!--<strong style="color: #005F40;">Líder</strong>-->
                        </div>
                    </div>
                </div>
                      <?php
                      }else{ //DIV DE MIEMBROS DE PROYECTO?>
                        <div class='card bordes'>
                          <div class=''>
                          <!--<div class='izquierda margenes'><img src='imag/perfil.png' alt='' class='imagen'></div>-->
                            <div class='izquierda margenes'>
                              <?php
                                echo '<img class="img-responsive" src="'.$miembros['foto'].'" alt="" style="border-radius: 10%; max-hight: 5%; max-width: 5%;">';
                              ?>
                              <strong class=''>
                                <?php echo "<a style='color:black;' href='tipoPErfil.php?id=".$miembros['id']."'>".$miembros['nombre']." ".$miembros['apellidoPaterno']." ".$miembros['apellidoMaterno']."</a>" ?> 
                              </strong>&nbsp;&nbsp;
                              <button type="button" class="btn btn-outline-secondary btn-sm" disabled>Miembro</button>&nbsp;&nbsp;&nbsp;&nbsp;<?php 
                                if($trabajo['idLider'] == $_SESSION['id']){
                                echo '<a class="btn btn-outline-danger btn-sm" href="solicitudes.php?opc=4&lid='.$trabajo['idLider'].'&id='.$trabajo1['idUsuario'].'" role="button">Expulsar</a>';
                                    }
                                ?>
                        </div>
                    </div>
                </div>
                        <?php
                      }
                    }
                  }
                  
                }
              }            
            ?>

          </div>
        
        </div>

        </div>

      </div>
    <!-- MODAL INTEGRANTES DE PROYECTO-->

    <!-- MODAL EDITAR PROYECTO -->

    <div class="modal fade" tabindex="-1" id="editarProyecto">

      <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

          <div class="modal-header">

            <h4>Editar Proyecto</h4>

            <button class="close" data-dismiss="modal">&times;</button>

          </div>

          <div class="modal-body"> 

            <form class="" name="sentMessage" id="contactForm" method="POST" action="editarProyecto.php" enctype="multipart/form-data">

            <h6>Nombre del Proyecto</h6>

            <input type="hidden" name="idP" id="idP" value="<?php echo $trabajo['id']; ?>">

            <input type="hidden" name="idE" id="idLider" value="<?php echo $trabajo['idLider']; ?>">

            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del Proyecto" value="<?php echo $trabajo['nombre']; ?>">

            <h6>Descripcion</h6>

            <textarea class="form-control" name="descripcion" id="descripcion" cols="47" rows="5" placeholder="Redacta tu descripción"><?php echo $trabajo['descripcion'] ?></textarea>

            <h6>Imagen</h6>

            <input type="file" class="form-control form-control-sm" id="foto" name="foto" value="">
          
          </div>

          <div class="modal-footer">

          <!--<?php echo "<a href='editarPerfil.php?id=".$tabla['id']."' class='btn btn-lg btn-success'>Guardar Cambios</a>" ?>-->

          <center><button class="btn btn-lg btn-success" type="submit">Guardar Cambios</button></center>

          </div>

        </div>

      </div> 

    </div>

    

    <!-- SEPARADO DIV DE PROYECTO-->
    <main class="container">

    <div class="row mb-2">

    <div class="col-md-12">

      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm position-relative esp">
        <!-- DIV DE PROYECTO -->
        <div class="row mb-2">
<!-- opciones del proyecto-->        

          <div id="información" class="col-md-8 flex-md-row mb-4">
          <strong class="d-inline-block mb-2 text-success">Proyecto</strong>

          <h4 class="mb-0"><?php echo $trabajo['nombre'] ?></h4>

          <h6 class="mb-0"><?php echo $trabajo['descripcion'] ?></h6>
          </div>

          <div id="opciones" class="col-md-4">
          <!--<button onclick=""></button>-->
          <div id="opciones" class="row col-md-4" style="left: 80%;">
          <a type="button" data-toggle="modal" data-target="#INTEGRANTES" id="'<?php $trabajo['id'] ?>"><small style="align-content: right;">
            <?php echo $trabajo['miembros'] ."/". $trabajo['capacidad'] .'&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
              <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
              <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
              <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>';
              if($trabajo['idLider'] == $_SESSION['id']){
              echo '</svg>&nbsp;&nbsp;&nbsp;&nbsp;<a class="right" type="button" data-toggle="modal" data-target="#editarProyecto" id="'.$_SESSION['id'].'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
              <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
              <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
              </svg>
              </a>'; 
            } 
            
              //if($trabajo['idLider'] != $_SESSION['id'] && $_SESSION['proyecto'])
              ?>
           </small></a>
           <?php
            $sql = "SELECT * FROM solicitud WHERE idDe = '".$_SESSION['id']."'";
            $result= mysqli_query($Conexion,$sql);
            while ($solicitudes= mysqli_fetch_array($result)) {
            if($_SESSION['equipo'] == "1" && $solicitudes['estado']=="1"){
              echo '&nbsp;&nbsp;&nbsp;<a href="solicitudes.php?opc=4&lid='.$trabajo['idLider'].'&id='.$_SESSION['id'].'" style="color: red;padding-top: 5%;">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
              </svg>
              </a>';
              }
            }
           ?>
           <!--<input type="button" class="ropdown-item">-->
          </div><br/><br/>
          <?php echo '<img class="img-responsive posicion" src="'.$trabajo['foto'].'" alt="" style="max-width: 100px;
          max-height: 100px; border-radius: 10%;">'; ?>
        </div>
        </div>



      </div>

    </div>

    

    </main>
    <div id="disqus_thread" style="margin-top: 1%;"></div>
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://university-proyects.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

    <?php

                    }

                        

                    }else{

                        echo "<button class='btn btn-lg btn-success btn-block' data-toggle='modal' data-target='#project' id=". $idUser .">Agregar Proyecto</button><br/>";

                    }

                    

    }



    mysqli_close($Conexion);

    ?>



  </div>

  </div>

  </div>

  <!-- Footer -->
  <?php
  include_once('footer.php');
  ?>

  <!-- Bootstrap core JavaScript -->

  <script src="vendor/jquery/jquery.min.js"></script>

  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
<script id="dsq-count-scr" src="//university-proyects.disqus.com/count.js" async></script>

</html>

