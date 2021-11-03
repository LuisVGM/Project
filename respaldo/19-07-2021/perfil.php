<?php
    include "Conexion.php";
    //RETOMAMOS LA SESION QUE ESTA INICIADA
    session_start();
    //SI NO HAY INICIADA UNA SESION REDIRIGIRA AL INDEX
    if(!isset($_SESSION["usuario"])){
      header('Location: index.html');
  }
    include_once('refresh.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $_SESSION['name']; ?></title>
  <link rel="icon" href="favicon.ico" type="image/x-icon">
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
    height: 110px;
    width: 130px;
    max-height: 130px;
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
  .limite{
    max-width: 100px;
    max-height: 150px;
  }
  .posicion{
    position: relative;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
  }
</style>
<body>
<?php
    
    
    $usr = $_SESSION['usuario'];
    $pass = $_SESSION['contraseña'];
    $_SESSION['editarP'] = 1;
    $sql ="SELECT * FROM usuario WHERE email='$usr' AND contraseña='$pass'";
    $result= mysqli_query($Conexion,$sql);
    while ($tabla= mysqli_fetch_array($result)) {
        $idUser=$tabla['id'];
        $_SESSION['name']=$tabla['nombre'];
        $_SESSION['foto'] = $tabla['foto'];

        $imagen = $tabla['foto'];
        //TABLA ALUMNO
        $sql ="SELECT * FROM maestro WHERE idUsuario ='$idUser'";
        $result= mysqli_query($Conexion,$sql);
        while ($maestro= mysqli_fetch_array($result)) {
            $idMaestro=$maestro['id'];
            $idA=$maestro['idArea'];
            $idNA=$maestro['idNA'];
            $idE=$maestro['idEspecialidad'];
            $idAsignatura=$maestro['idAsignatura'];
            $idAsignatura2=$maestro['idAsignatura2'];
            $idAsignatura3=$maestro['idAsignatura3'];
            $idAsignatura4=$maestro['idAsignatura4'];
            //TABLA AREA
            $sql ="SELECT * FROM area WHERE id ='$idA'";
            $result= mysqli_query($Conexion,$sql);
            while ($area= mysqli_fetch_array($result)) {
                    $sql ="SELECT * FROM nivelacademico WHERE id ='$idNA'";
                    $result= mysqli_query($Conexion,$sql);
                    while ($nivel= mysqli_fetch_array($result)) {
                      $sql ="SELECT * FROM especialidad WHERE id ='$idE'";
                      $result= mysqli_query($Conexion,$sql);
                      while ($especialidad= mysqli_fetch_array($result)) {
?>
  <!-- Navigation -->
  <?php 
    include_once('header.php');
  ?>
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
  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <br><br>

    <!-- Image Header -->
    <div class="container">

      <!-- TI -->
      <div class="card mb-4 fond">
        <div class="card-body">
          <center><h2 class="card-title"><?php echo $tabla['nombre'] ." ". $tabla['apellidoPaterno'] ." ". $tabla['apellidoMaterno']; ?></h2>
          
          <!--<img class="img-responsive" src="imag/perfil.png" alt="" width="150" height="150">-->
          <?php
          echo '<img class="img-responsive limite" src="'.$imagen.'" alt="" 
          style="border-radius: 10%;"<br/>';
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
          <h6 class="mb-0"><?php echo $tabla['email'] ?></h6>
        </div>
        <div class="d-lg-block">
          <!--<svg class="bd-placeholder-img" width="110" height="110" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: HOLA" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Hola</text></svg>-->
          
          <img src="https://www.pngkey.com/png/detail/333-3330465_imagen-de-el-correo.png" class="ventana">
        </div>
      </div>
    </div>
    <!-- AREA -->
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Área</strong>
          <h6 class="mb-0"><?php echo $area['nombreArea'] ?></h6>
        </div>
        <!--<div class="col-auto d-none d-lg-block">
        <svg class="bd-placeholder-img" width="110" height="110" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: HOLA" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Cuatrimestre</title><rect width="100%" height="100%" fill="#005F40"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"><?php echo $area['descripcion'] ?></text></svg>
        </div>-->

        <!-- PRUEBA DEL DIV CON LAS INICIALES-->
        <div class="ventana" style="background-color: #005F40!important">

        <?php echo "<p class='text-c'>".$area['descripcion']."</p>" ?>

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
        <div class="col-auto d-none d-lg-block">
        <img src="https://karlanarvaez.webcindario.com/grado.png" width="110" height="110">

        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Especialidad</strong>
          <h6 class="mb-0"><?php echo $especialidad['especialidad'] ?></h6>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="https://bestbarnone.drinksenseab.ca/wp-content/themes/best-bar-none/images/program-icon-stay.png" width="110" height="110">

        </div>
      </div>
    </div>
  </div>
  <!-- TERCERA SECCION-->
  <div class="row mb-2">
    <div class="col-md-12">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Asignaturas</strong>
          <?php 
          //VERIFICACION DE EXISTENCIA DE ASIGNATURA 1
            $sql ="SELECT asignatura FROM asignatura WHERE id='$idAsignatura';";
            $result= mysqli_query($Conexion,$sql);
            $asignatura= mysqli_fetch_array($result); 
            echo "<h6 class='mb-0'>".$asignatura['asignatura']."</h6>";
            //VERIFICACION DE EXISTENCIA DE ASIGNATURA 2
            $sql ="SELECT asignatura FROM asignatura WHERE id='$idAsignatura2';";
            $result= mysqli_query($Conexion,$sql);
            $asignatura= mysqli_fetch_array($result); 
            if($idAsignatura2 != "")
            echo "<h6 class='mb-0'>".$asignatura['asignatura']."</h6>"; 
            //VERIFICACION DE EXISTENCIA DE ASIGNATURA 
            $sql ="SELECT asignatura FROM asignatura WHERE id='$idAsignatura3';";
            $result= mysqli_query($Conexion,$sql);
            $asignatura= mysqli_fetch_array($result); 
            if($idAsignatura3 != "")
            echo "<h6 class='mb-0'>".$asignatura['asignatura']."</h6>";
            //VERIFICACION DE EXISTENCIA DE ASIGNATURA 4
            $sql ="SELECT asignatura FROM asignatura WHERE id='$idAsignatura4';";
            $result= mysqli_query($Conexion,$sql);
            $asignatura= mysqli_fetch_array($result);
            if($idAsignatura4 != "")
            echo "<h6 class='mb-0'>".$asignatura['asignatura']."</h6>";          
          ?>
        </div>
        <div class="col-auto d-none d-lg-block">
            <img src="https://colebioqsf2.org/colebioq_control/files/novedades/3_MATRICULA.png" width="110" height="110">
        </div>
      </div>
    </div>
  </div>
  <!-- SEGUNDA SECCION-->
    </main>

    <!-- NMODAL EDITAR PERFIL -->
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
            <input type="hidden" name="idE" id="idE" value="<?php echo $maestro['idEspecialidad']; ?>">
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
            <a class='btn btn-lg btn-white text-black' data-dismiss="modal">Cancelar</a>
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
      

    mysqli_close($Conexion);
    ?>

  </div>
  </div>
  </div>
  
    
    <!-- /.row -->

  
  <!-- /.container -->
  
  
  
  <!-- Footer -->
  <?php
    include_once('footer.php');
  ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
