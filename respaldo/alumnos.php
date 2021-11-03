<?php
    include_once('Conexion.php');
    //RETOMAMOS LA SESION QUE ESTA INICIADA
    session_start();
    //SI NO HAY INICIADA UNA SESION REDIRIGIRA AL INDEX
    if(!isset($_SESSION["usuario"])){
        header('Location: index.html');
    }
    $back = 0;
    $myId=$_SESSION['id'];
    include_once('inactividad.php');
    include_once('permisoEdit.php');
    include_once('refresh.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Alumnos-UTSV">
  <meta name="author" content="Luis Valentin">

  <title>Alumnos - UTSV</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

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
  .tarjeta{
    padding-top: 15px;
    padding-left: 30px;
    padding-right: 30px;
    padding-block-end: 15px;
  }
  .margenes{
    padding-top: 15px;
    padding-left: 15px;
    padding-right: 15px;
    padding-block-end: 15px;
  }
  .pad{
    padding-left: 20px;
  }
  .color{
      color: #28A745;
  }
  A{
      text-decoration:none;
  }

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
    <h1 class="mt-4 mb-3">Usuarios registrados en
      <small>UNIP</small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="usuarios.php">Inicio</a>
      </li>
      <li class="breadcrumb-item active">Usuarios</li>
    </ol>

    <div class="row">
      <div class="container">
      <div class="form-1-2"> 
            
                <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" class="row g-3" >
                
                <input  type="text" style ="background: transparent; width: auto;" class="form-control" name="usuario" placeholder="Buscar">&nbsp;&nbsp;
            <select class="form-control" style ="width: auto" name="rol" id="rol">
              <option value="">TODOS</option>
              <?php
                $select6="SELECT id,nombreArea FROM area";
                $ejecutar1= mysqli_query($Conexion,$select6);
                while ($area= mysqli_fetch_array($ejecutar1)) {
            ?>
                <option value=<?php echo $area['id'] ?> > <?php echo $area['nombreArea'] ?></option>
            <?php } ?>
          </select>&nbsp;&nbsp;
          <select class="form-control" style ="width: auto" name="cuatri" id="cuatri">
              <option value="">CUATRIMESTRE</option>
              <?php
                $select60="SELECT id,nombre FROM cuatrimestre;";
                $ejecutar10= mysqli_query($Conexion,$select60);
                while ($cuatri= mysqli_fetch_array($ejecutar10)) {
            ?>
                <option value=<?php echo $cuatri['id'] ?> > <?php echo $cuatri['nombre'] ?></option>
            <?php } ?>
          </select>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3" name="submit" style="background-color:#005F40; border-color:white; ">Buscar</button>
            </div>
            </form>
    </div>
      <br/>
      <!-- Bootstrap core JavaScript -->
      <?php
               if(isset($_POST['submit'])){
                $name = $_POST['usuario'];
                $tipo = $_POST['rol'];
                $grado = $_POST['cuatri'];
                
                /*$query = "SELECT  id,nombre,apellidoPaterno,apellidoMaterno,email,idRol
                FROM usuario WHERE nombre LIKE '%$name%' AND idRol LIKE '%$tipo%' AND id != '$myId'";*/
               $query = "SELECT  usuario.id, usuario.nombre, usuario.apellidoPaterno,usuario.apellidoMaterno,
               usuario.email,usuario.idRol,alumno.idArea,alumno.idCuatrimestre, usuario.foto
               FROM usuario INNER JOIN alumno ON usuario.id = alumno.idUsuario
               WHERE usuario.nombre LIKE '%$name%'
               AND usuario.idRol = '1' AND usuario.id != '$myId' 
               AND alumno.idArea LIKE '%$tipo%' AND alumno.idCuatrimestre LIKE '%$grado%';";
               
               
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
                <div class='card bordes'>
                    <div class='tarjeta'>
                    <div class='izquierda margenes'>
                          <?php
                            echo '<img class="img-responsive limite" src="'.$imagen.'" alt="" style="border-radius: 10%;"<br/>';
                          ?>
                        </div>
                            <div class='izquierda pad'><h2 class='color'><?php echo "<a href='tipoPErfil.php?id=".$fila['id']."'>".$fila['nombre']." ".$fila['apellidoPaterno']." ".$fila['apellidoMaterno']."</a>" ?> </h2>
                                <h6>E-mail: </h6><?php echo "<a href='#'><u>".$fila['email']."</u></a>"?>
                                <h6>Rol: </h6><?php 
                                $select2="SELECT * FROM rol WHERE id = '$tipo'";
                                $ejecutar2= mysqli_query($Conexion,$select2);
                                while ($rol= mysqli_fetch_array($ejecutar2)) {
                                    echo $rol['rol']; 
                                }
                                ?><br/>
                            <?php echo "<a href='email.php?id=".$fila['email']."' class='btn btn-primary'>Enviar Correo &rarr;</a>" ?>
                        </div>
                    </div>
                </div><br/>
            <?php
                }
            }else{
                $query = "SELECT  id,nombre,apellidoPaterno,apellidoMaterno,email,idRol,foto
                FROM usuario WHERE id != '$myId' AND idRol='1';";
               
               
               
               if(!$resultado = mysqli_query($Conexion,$query)){
                exit(mysqli_error($Conexion));

                }
                
                if(mysqli_num_rows($resultado)==0){
                  echo' <h1 class="text-center" style="font-size:50px; margin-left:30px;">
                  <p class="text-center"> Lo sentimos, no hay más usuarios registrados.</p>
                 </h1>';


                }
                
                $resultado = mysqli_query($Conexion,$query);
    
                while($fila=mysqli_fetch_array($resultado)  ){ 
                    $tipo= $fila['idRol'];
                    $imagen = $fila['foto'];
                
            ?>
                <div class='card bordes'>
                    <div class='tarjeta'>
                        <!--<div class='izquierda margenes'><img src='imag/perfil.png' alt='' class='imagen'></div>-->
                        <div class='izquierda margenes'>
                          <?php
                            echo '<img class="img-responsive limite" src="'.$imagen.'" alt="" style="border-radius: 10%;"<br/>';
                          ?>
                        </div>
                            <div class='izquierda pad'><h2 class='color'><?php echo "<a href='tipoPErfil.php?id=".$fila['id']."'>".$fila['nombre']." ".$fila['apellidoPaterno']." ".$fila['apellidoMaterno']."</a>" ?> </h2>
                                <h6>E-mail: </h6><?php echo "<a href='#'><u>".$fila['email']."</u></a>"?>
                                <h6>Rol: </h6><?php 
                                $select2="SELECT * FROM rol WHERE id = '$tipo'";
                                $ejecutar2= mysqli_query($Conexion,$select2);
                                while ($rol= mysqli_fetch_array($ejecutar2)) {
                                    echo $rol['rol']; 
                                }
                                ?><br/>
                            <?php echo "<a href='email.php?id=".$fila['email']."' class='btn btn-primary'>Enviar Correo &rarr;</a>" ?>
                        </div>
                    </div>
                </div><br/>
            <?php
                }
            }
            ?>
      </div>

    </div>
    <!-- /.row -->

  </div>
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
