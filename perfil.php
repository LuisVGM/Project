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



  <title><?php echo $_SESSION['name']; ?></title>

    

  <!-- Bootstrap core CSS -->

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    

  <!-- Custom styles for this template -->

  <link href="css/modern-business.css" rel="stylesheet">



  <link href="css/blog.rtl.css" rel="stylesheet">



</head>

<style>
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
  .panelInfo{
      margin-block-end: 2%;
      padding-top: 2%;
      padding-left: 2%;
      padding-right: 2%;
      padding-block-end: 2%;
  }
  .datos{
      list-style: none;
  }
  .portada{
    margin-top: 1%;
    display: block;
    position: relative;
    border-radius:10px;
    /*border: 1px solid #BC3CFF;*/
    width: 100%;
    height: 22rem;
    background-position: 50% 50%;
    /*height:220px;*/
    background-repeat:no-repeat;
    background-size: cover;
  }
  .perfil{
    width: auto;
    border: 5px solid white;
    border-radius: 50%;
    position: relative;
    transform: translateY(-40%);
  }
  .nameperfil{
    position: relative;
    transform: translateY(-80%);
  }
  .acomodar{
    position: relative;
    transform: translateX(44%) translateY(-500%);
  }
  .photo{
    /*display: block;
    justify-content: center;
    align-items: center;*/
    margin-left: auto;
    margin-right: auto;
    display: block;
    
  }
  li {
	margin: 0px;
	padding: 0px;
	
}
ul {
	margin: 0px;
	padding: 0px;
}
  @media screen and (max-width: 900px){
    .portada{
      margin-top: 4%;
      height: 18rem;
      background-position: 50% 50%;
    }
    .nameperfil{
    position: relative;
    transform: translateY(-40%);
    max-width: 80%;
    text-align: center;
  }
  .panelInfo{
    padding-top: 3%;
    padding-block-end: 3%;
  }
  .repons{
    max-width: 90%;
    /*word-wrap: break-word;*/
  }
  .inf{
    width: 100%;
  }
  #cambiarP{
    margin-top: 4%;
    font: 0/0 a;
  }
  }
  @media screen and (max-width: 1000px){
    .portada{
      margin-top: 4%;
      height: 18rem;
    }
  }
  @media screen and (max-width: 1050px){
    .portada{
      margin-top: 3%;
      height: 18rem;
    }
  }
  @media screen and (max-width: 1090px){
    .portada{
      margin-top: 2%;
      height: 18rem;
    }
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

        $sql1 ="SELECT * FROM maestro WHERE idUsuario ='".$_SESSION['id']."'";

        $result= mysqli_query($Conexion,$sql1);

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

            $sql2 ="SELECT * FROM area WHERE id ='$idA'";

            $result2= mysqli_query($Conexion,$sql2);

            while ($area= mysqli_fetch_array($result2)) {

                    $sql4 ="SELECT * FROM nivelacademico WHERE id ='$idNA'";

                    $result= mysqli_query($Conexion,$sql4);

                    while ($nivel= mysqli_fetch_array($result)) {

                      $sql5 ="SELECT * FROM especialidad WHERE id ='$idE'";

                      $result= mysqli_query($Conexion,$sql5);

                      while ($especialidad= mysqli_fetch_array($result)) {

?>

  <!-- Navigation -->
  <?php
  include_once('header.php');
  ?>
  <!-- Page Content 

  <div class="container">-->



    <!-- Page Heading/Breadcrumbs 

    <h1 class="mt-4 mb-3">Perfil</h1>-->

    <!-- Image Header -->

    <div class="container">



      <!-- TI -->

      <div class="card" style="border: none;">
      
        <!--<div class="card-body">-->
          <div class="portada" style="background-image: url(<?php echo $tabla['portada']; ?>); cursor: pointer;";>
            <!--<a class="btn btn-secondary" id="cambiarP" href="#" style="float: right;" data-toggle="modal" data-target="#fotoPortada" id="<?php $_SESSION['id'] ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
              <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
              <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
            </svg>&nbsp;Cambiar portada</a>
             Example single danger button -->
<div class="btn-group"  style="float: right;margin-top: 1%;margin-right:2px;">
  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera" viewBox="0 0 16 16">
                <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"/>
                <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
              </svg>&nbsp;&nbsp;Cambiar imágen
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#fotoPerfil" id="<?php $_SESSION['id'] ?>">Foto de perfil</a>
    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#fotoPortada" id="<?php $_SESSION['id'] ?>">Foto de portada</a>
  </div>
</div>
          <!-- -->
          </div>
          <!-- -->
          
        <div class="photo perfil">
          <?php
          //style="background-image: url(<?php echo $tabla['portada']; ? >);"
            echo '<img class=" limite" src="'.$imagen.'" alt="" style="border-radius: 50%;"<br/>';
          ?>
        </div>
        <!-- CAMBIAR FOTO PERFIL 
        <div class="acomodar"><a href="#" class="btn btn-secondary cambiarP" style="padding-left: 5px;padding-right:5px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera" viewBox="0 0 16 16">
  <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"/>
  <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
</svg></a></div>-->
            <!-- NOMBRE DE USUARIO-->
        <div class="photo nameperfil">
          <h2 class=""><?php echo $_SESSION['name'] ." ". $_SESSION['apellidoP'] ." ". $_SESSION['apellidoM']; ?></h2>
        </div>

        <!--</div>-->
      </div>

      

    <!-- Marketing Icons Section -->
            <!-- LISTA -->
    <main class="container">
        <div class="border rounded shadow-sm position-relative row panelInfo">
          <div class="col-md-6">
            <ul class="datos">
              <li>
              
              <strong class="d-inline-block mb-2 text-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
              </svg>&nbsp;Correo Electronico:</strong>
              <?php echo "<h6 class='mb-0 repons'>".$_SESSION['usuario']."</h6>" ?></li>
              <li><strong class="d-inline-block mb-2 text-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z"/>
                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
              </svg>&nbsp;Nivel Académico:</strong>
              <?php echo "<h6 class='mb-0'>".$nivel['descripcion']."</h6>" ?></li>
              
              <li><strong class="d-inline-block mb-2 text-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
</svg>&nbsp;Especialidad:</strong>
              <?php echo "<h6 class='mb-0'>".$especialidad['especialidad']."</h6>" ?></li>
            </ul>
          </div>
          <div class="col-md-6">
            <ul class="datos">
              
              <li><strong class="d-inline-block mb-2 text-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tools" viewBox="0 0 16 16">
  <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.356 3.356a1 1 0 0 0 1.414 0l1.586-1.586a1 1 0 0 0 0-1.414l-3.356-3.356a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0zm9.646 10.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708zM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11z"/>
</svg>&nbsp;Área:</strong>
              <?php echo "<h6 class='mb-0'>".$area['nombreArea']."</h6>" ?></li>
              <li><strong class="d-inline-block mb-2 text-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-numeric-down" viewBox="0 0 16 16">
  <path d="M12.438 1.668V7H11.39V2.684h-.051l-1.211.859v-.969l1.262-.906h1.046z"/>
  <path fill-rule="evenodd" d="M11.36 14.098c-1.137 0-1.708-.657-1.762-1.278h1.004c.058.223.343.45.773.45.824 0 1.164-.829 1.133-1.856h-.059c-.148.39-.57.742-1.261.742-.91 0-1.72-.613-1.72-1.758 0-1.148.848-1.835 1.973-1.835 1.09 0 2.063.636 2.063 2.687 0 1.867-.723 2.848-2.145 2.848zm.062-2.735c.504 0 .933-.336.933-.972 0-.633-.398-1.008-.94-1.008-.52 0-.927.375-.927 1 0 .64.418.98.934.98z"/>
  <path d="M4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
</svg>&nbsp;Asignaturas:</strong>
          <?php echo "<h6 class='mb-0'>";
          //VERIFICACION DE EXISTENCIA DE ASIGNATURA 1
            $sql ="SELECT asignatura FROM asignatura WHERE id='$idAsignatura';";
            $result= mysqli_query($Conexion,$sql);
            $asignatura= mysqli_fetch_array($result); 
            echo $asignatura['asignatura'];
            //VERIFICACION DE EXISTENCIA DE ASIGNATURA 2
            $sql ="SELECT asignatura FROM asignatura WHERE id='$idAsignatura2';";
            $result= mysqli_query($Conexion,$sql);
            $asignatura= mysqli_fetch_array($result); 
            if($idAsignatura2 != "")
            echo "<br>".$asignatura['asignatura']; 
            //VERIFICACION DE EXISTENCIA DE ASIGNATURA 
            $sql ="SELECT asignatura FROM asignatura WHERE id='$idAsignatura3';";
            $result= mysqli_query($Conexion,$sql);
            $asignatura= mysqli_fetch_array($result); 
            if($idAsignatura3 != "")
            echo "<br>".$asignatura['asignatura'];
            //VERIFICACION DE EXISTENCIA DE ASIGNATURA 4
            $sql ="SELECT asignatura FROM asignatura WHERE id='$idAsignatura4';";
            $result= mysqli_query($Conexion,$sql);
            $asignatura= mysqli_fetch_array($result);
            if($idAsignatura4 != "")
            echo "<br>".$asignatura['asignatura'];   
            echo "</h6>";
          ?></li>
            </ul>
          </div>
        </div>
    </main>
          <!-- LISTA -->

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
            <input type="hidden" name="newid" id="newid" value="perfil">
            <input type="file" name="foto" id="foto"><br/><br/>
          <center><button class="btn btn-lg btn-success" type="submit">Guardar Cambio</button></form></center>

          </div>

        </div>

      </div> 

    </div>

    <!--MODAL EDITAR FOTO PORTADA-->
    <div class="modal fade" tabindex="-1" id="fotoPortada">

      <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

          <div class="modal-header">

            <h4>Cambiar foto de Portada</h4>

            <button class="close" data-dismiss="modal">&times;</button>

          </div>

          <div class="modal-body"> 

            <form class="form-signin" name="sentMessage" id="contactForm" method="POST" action="cambioFoto.php" enctype="multipart/form-data">
            <input type="hidden" name="newid" id="newid" value="portada">
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

