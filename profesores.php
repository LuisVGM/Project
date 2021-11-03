<?php
    include('Conexion.php');
    //RETOMAMOS LA SESION QUE ESTA INICIADA
    session_start();
    //SI NO HAY INICIADA UNA SESION REDIRIGIRA AL INDEX
    if(!isset($_SESSION["usuario"])){
        header('Location: index.html');
    }
    $back = 0;
    $myId=$_SESSION['id'];
    include_once('permisoEdit.php');
    include_once('inactividad.php');
    include_once('refresh.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Alumnos-UTSV">
  <meta name="author" content="Luis Valentin">

  <title>Asesores - UTSV</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

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
  body{
    font-family: 'Roboto', sans-serif;
  }
  h1, h2, h3, h4, h5, h6 {
    font-family: 'Roboto', sans-serif;
  }
  .box{
    width: 50%;
    word-wrap: break-word;
    height: 60px;
    border: 1px solid;
    border-radius: 30px;
    outline-style: none;
    padding-left: 10px;
  }
  .box1{
    width: 20%;
    border-radius: 20px;
    padding-left: 10px;
  }
  .bordes{
      border-radius: 15px;
  }
  .izquierda{
    float: left;
  }
  .imagen{
    width: 190px;
    height: 190px;
  }
  .margenP{
      margin-top: 2%;
      margin-bottom: 2%;
      margin-left: 0;
      margin-right: 3%;
      width: 35vh;
      height: auto;
      max-height: 52vh;
      border-radius: 10px;
    }
    .tarjeta{
        margin-block-end: 2%;
        height: auto;
        max-height: 50vh;
        padding: 0;
    }
  .pad{
    margin-left: 20px;
  }
  .archivo{
      /*margin-block-end: 2%;*/
      /*margin-top: 5%;*/
      /*width: 20vh;*/
      height: 33vh;
      /*height: 12em;*/
      /*display: block;*/
      background-size: cover;
      background-position: 100% 50%;
      background-repeat: no-repeat;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      margin-bottom: 5%;
    }
    .archivo:hover{
      opacity: 0.8;
    }
    .nombres{
        font-family: Helvetica;
        font-size: 13px;
        /*margin-left: 0;
        margin-right: 0;
        margin-top: 0;
        margin-bottom: 6%;*/
    }
    .datosU{
    margin-left: 3%;
    margin-right: 3%;
    margin-bottom: 5%;
  }
  .email{
    margin-left: 3%;
    margin-right: 3%;
    margin-bottom: 3%;
  }
  a{
      color: black;
      text-decoration:none;
  }a:hover { color:#00A0C6; text-decoration:none; cursor:pointer; }
  .limite{
    max-width: 150px;
    max-height: 200px;
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
    <h1 class="mt-4 mb-3">Proferores
      <small>- UTSV</small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="profesores.php">Inicio</a>
      </li>
      <li class="breadcrumb-item active">Asesores</li>
    </ol>

      <div class="container">
            
                <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" class="row g-3" >
                
                <input  type="text" style ="background: transparent; width: auto;" class="form-control" name="usuario" placeholder="Buscar">&nbsp;&nbsp;
            <select class="form-control" style ="width: auto" name="area" id="area">
              <option value="">TODAS LAS ÁREAS</option>
              <?php
                $select6="SELECT id,nombreArea FROM area";
                $ejecutar1= mysqli_query($Conexion,$select6);
                while ($area= mysqli_fetch_array($ejecutar1)) {
            ?>
                <option value=<?php echo $area['id'] ?> > <?php echo $area['nombreArea'] ?></option>
            <?php } ?>
          </select>&nbsp;&nbsp;
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3" name="submit" style="background-color:#005F40; border-color:white; ">Buscar</button>
            </div>
            </form>
    
      <div class="row">
        
      
      <!-- Bootstrap core JavaScript -->
      <?php
               if(isset($_POST['submit'])){
                $name = $_POST['usuario'];
                $tipo = $_POST['area'];
                
                $query = "SELECT  usuario.id, usuario.nombre, usuario.apellidoPaterno,usuario.apellidoMaterno,
                usuario.email,usuario.idRol,maestro.idAsignatura,usuario.foto
                FROM usuario INNER JOIN maestro ON usuario.id = maestro.idUsuario
                WHERE usuario.nombre LIKE '%$name%'
                AND usuario.idRol = '2' AND usuario.id != '$myId' 
                AND maestro.idAsignatura LIKE '%$tipo%';";
               
               
               
               if(!$resultado = mysqli_query($Conexion,$query)){
                exit(mysqli_error($Conexion));

                }
                
                if(mysqli_num_rows($resultado)==0){
                    echo "<br/>";
                  echo' <h1 class="text-center" style="font-size:50px; margin-left:30px;">
                  <p class="text-center " > No hubo ningún resultado parecido</p>
                 </h1>';
                 echo "<br/>";

                }
                
                $resultado = mysqli_query($Conexion,$query);
    
                while($fila=mysqli_fetch_array($resultado)  ){ 
                    $tipo= $fila['idRol'];
                    $imagen = $fila['foto'];
                
            ?>
                <!-- NUEVO DIV DE USUARIOS -->
                <div class="card margenP">
                    <div class="tarjeta">
                    <?php echo "<a href='tipoPErfil.php?id=".$fila['id']."' target='_blank'>";?>
                        <div class="archivo" style="background-image: url(<?php echo $imagen ?>);"></div>
                    <?php echo "</a>"; ?>
                        <div class="datosU">
                            <?php echo "<a href='tipoPErfil.php?id=".$fila['id']."' target='_blank'><strong class='nombres'>".$fila['nombre']." ".$fila['apellidoPaterno']." ".$fila['apellidoMaterno']."</strong></a>" ?> 
                            <!--<a href="#" class="btn btn-sm btn-success" style="width: 90%;">Correo</a>-->
                        </div>
                        <div class="email">
                            <?php echo "<a href='email.php?id=".$fila['email']."' class='btn btn-sm text-white' style='font-family: Helvetica;width:100%;margin-top:0; background-color:#005F40;'>E-mail</a>"?>
                        </div>
                        
                    </div>
                </div>
                <!-- NUEVO DIV DE USUARIOS -->
            <?php
                }
            }else{
                $query = "SELECT  id,nombre,apellidoPaterno,apellidoMaterno,email,idRol,foto
                FROM usuario WHERE id != '$myId' AND idRol = '2';";
               
               
               
               if(!$resultado = mysqli_query($Conexion,$query)){
                exit(mysqli_error($Conexion));

                }
                
                if(mysqli_num_rows($resultado)==0){
                  echo' <h1 class="text-center" style="font-size:50px; margin-left:30px;">
                  <p class="text-light text-center " > Lo sentimos, no encontramos nada parecido.</p>
                 </h1>';


                }
                
                $resultado = mysqli_query($Conexion,$query);
    
                while($fila=mysqli_fetch_array($resultado)  ){ 
                    $tipo= $fila['idRol'];
                    $imagen = $fila['foto'];
                
            ?>
                <!-- NUEVO DIV DE USUARIOS -->
                <div class="card margenP">
                    <div class="tarjeta">
                    <?php echo "<a href='tipoPErfil.php?id=".$fila['id']."' target='_blank'>";?>
                        <div class="archivo" style="background-image: url(<?php echo $imagen ?>);"></div>
                    <?php echo "</a>"; ?>
                        <div class="datosU">
                            <?php echo "<a href='tipoPErfil.php?id=".$fila['id']."' target='_blank'><strong class='nombres'>".$fila['nombre']." ".$fila['apellidoPaterno']." ".$fila['apellidoMaterno']."</strong></a>" ?> 
                            <!--<a href="#" class="btn btn-sm btn-success" style="width: 90%;">Correo</a>-->
                        </div>
                        <div class="email">
                            <?php echo "<a href='email.php?id=".$fila['email']."' class='btn btn-sm text-white' style='font-family: Helvetica;width:100%;margin-top:0; background-color:#005F40;'>E-mail</a>"?>
                        </div>
                        
                    </div>
                </div>
                <!-- NUEVO DIV DE USUARIOS -->
            <?php
                }
            }
            ?>
            </div>
            </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
