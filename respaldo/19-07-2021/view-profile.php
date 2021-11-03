<?php
session_start();
if(!isset($_SESSION["usuario"])){
        header('Location: index.html');
    }
error_reporting(0);
    include_once('Conexion.php');
    include_once('inactividad.php');
  include_once('permisoEdit.php');
    include_once('refresh.php');

    $back = 1;

    $Id = $_SESSION['idUsers'];
    $sql="SELECT * FROM usuario WHERE id='$Id'";
    $ejecutar= mysqli_query($Conexion,$sql);
    if (!$ejecutar){
      echo'<script type="text/javascript">alert("error");
	window.location.href="editar.php";</script>';
    }else{
        while ($tabla= mysqli_fetch_array($ejecutar)) {
          $imagen = $tabla['foto'];
          $_SESSION['nameUser']= $tabla['nombre'];
          $_SESSION['apellidoPUser']= $tabla['apellidoPaterno'];
          $_SESSION['apellidoMUser']= $tabla['apellidoMaterno'];
          $_SESSION['emailUser']= $tabla['email'];
        $sql ="SELECT * FROM alumno WHERE idUsuario ='$Id'";
        $result= mysqli_query($Conexion,$sql);
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
            $sql ="SELECT * FROM area WHERE id ='$idA'";
            $result= mysqli_query($Conexion,$sql);
            while ($area= mysqli_fetch_array($result)) {
                $sql ="SELECT * FROM cuatrimestre WHERE id ='$idC'";
                $result= mysqli_query($Conexion,$sql);
                while ($cuatri= mysqli_fetch_array($result)) {
                    $sql ="SELECT * FROM nivelacademico WHERE id ='$idNA'";
                    $result= mysqli_query($Conexion,$sql);
                    while ($nivel= mysqli_fetch_array($result)) {
                      $sql ="SELECT * FROM especialidad WHERE id ='$idE'";
                      $result= mysqli_query($Conexion,$sql);
                      while ($especialidad= mysqli_fetch_array($result)) {
                        $sql ="SELECT * FROM promedio WHERE id ='$idProm'";
                        $result= mysqli_query($Conexion,$sql);
                        while ($promedio= mysqli_fetch_array($result)) {
                          $sql ="SELECT * FROM grupo WHERE id ='$idG'";
                        $result= mysqli_query($Conexion,$sql);
                        while ($grupo= mysqli_fetch_array($result)) {
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $_SESSION['nameUser']; ?></title>
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

  <link href="css/blog.rtl.css" rel="stylesheet">

</head>
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
<style>
  .fond {
    background-image: url(imag/mex-fet.jpg);
  }
  
  #editaR{
    margin-top: 90px;
  }
  
  .ventana{
    height: 120px;
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

  .auto-texto{
    word-wrap: break-word;
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
</style>
<body>
  <!-- Navigation -->
  <?php
  include_once('header.php');
  ?>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <br><br>

    <!-- Image Header -->
    <div class="container">

      <!-- TI -->
      <div class="card mb-4 fond">
        <div class="card-body">
          <center><h2 class="card-title"><?php echo $_SESSION['nameUser'] ." ". $_SESSION['apellidoPUser'] ." ". $_SESSION['apellidoMUser']; ?></h2>
          
          <!--<img class="img-responsive" src="imag/perfil.png" alt="" width="150" height="150">-->
          <?php
            echo '<img class="img-responsive limite" src="'.$imagen.'" alt="" style="border-radius: 10%;"<br/>';
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
          <h6 class="mb-0 auto-texto"><?php echo "<a href='#'><u>".$_SESSION['emailUser']."</u></a>" ?></h6>
        </div>
        <div class=" d-none d-lg-block">
          <!--<svg class="bd-placeholder-img" width="110" height="110" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: HOLA" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Hola</text></svg>-->
          
          <img src="https://www.pngkey.com/png/detail/333-3330465_imagen-de-el-correo.png" class="ventana">
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
            <img src="https://colebioqsf2.org/colebioq_control/files/novedades/3_MATRICULA.png" class="ventana">
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
        <!--<div class="d-lg-block">
        <img src="https://karlanarvaez.webcindario.com/grado.png" class="ventana">

        </div>-->
        <div  class="ventana" style="background-color: #005F40!important">
          <?php echo "<h5 class='text-c'>".$nivel['nivel']."</h5>" ?>
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
          <img src="https://bestbarnone.drinksenseab.ca/wp-content/themes/best-bar-none/images/program-icon-stay.png" class="ventana">

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
          <?php echo "<h5 class='text-c'>".$cuatri['numero']."</h5>" ?>
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
        <!--CVENTANA ILUSTRATIVA-->
        <div class="ventana" style="background-color: #005F40!important">

        <?php echo "<h5 class='text-c'>".$area['descripcion']."</h5>" ?>

        </div>
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
        <div class="col-auto d-none d-lg-block">
        <img src="https://png.pngtree.com/element_origin_min_pic/00/00/06/12575cb97a22f0f.jpg" width="110" height="110">

        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Promedio</strong>
          <h6 class="mb-0"><?php echo $promedio['promedio'] ?></h6>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="https://www.oposicionesprl.com/wp-content/uploads/2019/07/calificaciones.jpg" width="110" height="110">

        </div>
      </div>
    </div>
    </div>
    </main>
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
                    while ($trabajo= mysqli_fetch_array($result)) {
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
                              </strong>
                                <small>Líder</small>
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
                              </strong>
                                <small>Miembro</small>
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

    <main class="container">
    <div class="row mb-2">
    <div class="col-md-12">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm position-relative esp">
        <div class="row mb-2">
        <div id="información" class="col-md-8">
          <strong class="d-inline-block mb-2 text-success">Proyecto</strong>

          <h4 class="mb-0"><?php echo $trabajo['nombre'] ?></h4>

          <h6 class="mb-0"><?php echo $trabajo['descripcion'] ?></h6>
          </div>

          <div id="opciones" class="col-md-4">
          <div id="opciones" class="row col-md-4" style="left: 80%;">
          
          <a type="button" data-toggle="modal" data-target="#INTEGRANTES" id="'<?php $trabajo['id'] ?>">
          <small style="align-content: right;">
            <?php 
            echo $trabajo['miembros'] ."/". $trabajo['capacidad'] .'&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
            <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
            </svg>'?>
          </small>
          </a>
          
          <?php
          if($_SESSION['equipo'] == ""){
            echo '&nbsp;&nbsp;&nbsp;<a href="solicitudes.php?opc=1&lid='.$trabajo['idLider'].'&id='.$_SESSION['id'].'" style="color: green;padding-top: 5%;">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
              </svg>
            </a>';
          }
          if($_SESSION['equipo'] == "1"){
            echo '&nbsp;&nbsp;&nbsp;<a href="solicitudes.php?opc=2&lid='.$trabajo['idLider'].'&id='.$_SESSION['id'].'" style="color: red;padding-top: 5%;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/>
            </svg>
            </a>';
          }
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
    }}

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
<script id="dsq-count-scr" src="//university-proyects.disqus.com/count.js" async></script>

</html>