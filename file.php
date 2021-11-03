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
    <h1 class="mt-4 mb-3">Alumnos -
      <small> UTSV</small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="usuarios.php">Inicio</a>
      </li>
      <li class="breadcrumb-item active">Alumnos</li>
    </ol>

    
    <div>
      <!-- INICIO FORMULARIO -->
      <form action="GET">
        <!-- NOMBRE -->
        <input type="text" name="nombre" placeholder="Nombre" value="">
        <!-- CAMPO -->
        <select name="area" id="">
          <option value="">Area</option>
          <option value="1">Tecnologías de la Información</option>
          <option value="2">Mecatrónica Área Automatización</option>
          <option value="3">Administración Área Capital Humano</option>
          <option value="4">Química Área Industrial</option>
          <option value="5">Mantenimiento Área Industrial</option>
          <option value="6">Energías Renovables</option>
          <option value="7">Contaduría</option>
          <option value="8">Mecánica Área Automotríz</option>
        </select>
        <!-- CUATRIMESTRE -->
        <select name="cuatri" id="">
          <option value="">Cuatrimestre</option>
          <option value="1">Primero</option>
          <option value="2">Segundo</option>
          <option value="3">Tercero</option>
          <option value="4">Cuarto</option>
          <option value="5">Quinto</option>
          <option value="6">Sexto</option>
          <option value="7">Séptimo</option>
          <option value="8">Octavo</option>
          <option value="9">Noveno</option>
          <option value="10">Décimo</option>
          <option value="11">Undécimo</option>
        </select>
        <button type="submit" class="btn text-white" style="background-color: #005F40!important">Buscar</button>
      </form>
      <!-- FIN FORMULARIO -->
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php
    //include_once('footer.php');
  ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
