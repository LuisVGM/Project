<?php

//RETOMAMOS LA SESION QUE ESTA INICIADA

  session_start();

  //SI NO HAY INICIADA UNA SESION REDIRIGIRA AL INDEX

  if(!isset($_SESSION["usuario"])){

    header('Location: index.php');

  }
  $back = 0;
  $id=$_SESSION['id'];

  include_once('Conexion.php');
  include_once('inactividad.php');
  include_once('permisoEdit.php');
  include_once('refresh.php');
?>

<!DOCTYPE html>

<html lang="en">



<head>



  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="">

  <meta name="author" content="">



  <title>Foro-UNIP</title>

<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
  <!-- Bootstrap core CSS -->

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/*ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <!-- Custom styles for this template -->

  <link href="css/modern-business.css" rel="stylesheet">





</head>

<style>

  h2{

color:black;

  }

  label{

color:black;

  }

  span{

	  color: #FFFFFF;

	  font-weight:bold;

  }

  .top{

    margin-top: 3%;

    width: 90%;

    padding-right:10%;

    padding-left:10%;

  }

  .btn-primary1 {

    background-color: #005F40;

    color: white;

    border-radius: 50px;

    padding-left: 2%;

    padding-right: 2%;

    padding-block-end: 1%;

    padding-top: 1%;

	}



  .contenedor{

    padding-left: 10%;

    padding-right: 10%;

    padding-block-end: 25px;

    overflow-y: scroll;

    height: 500px;

  }



	.message{

		background-color: #005F40;

		color: white;

		border-radius: 35px;

		padding: 5px;

    padding-right: 40px;

		margin-bottom: 2%;

    max-width: 100%;

    word-wrap: break-word;

    text-align: right;

    justify-items: end;

    align-items: end;

	}



  .messageO{

		background-color: #FFFFFF;

		color: black;

		border-radius: 35px;

		padding: 5px;

		margin-bottom: 3%;

    max-width: 100%;

    word-wrap: break-word;

    border-color: black;

    border-width: 1px;

    border-top-style: solid;

    border-right-style: solid;

    border-bottom-style: solid;

    border-left-style: solid; 

    padding-left: 40px;

	}



  .text-black{

    color: black;

  }



  .box{

    width: 80%;

    word-wrap: break-word;

    border: 1px solid;

    border-radius: 30px;

    outline-style: none;

    padding-left: 10px;

    padding-top: 10px;

  }

  .box2{

      width: 50%;

    word-wrap: break-word;

    padding-left: 10px;

  }



  .padding{padding-left: 40px;padding-block-end: 30px;}



.listado{

  background-color: #dedfde;

  border-radius: 20px;

  height: 50%;
  max-height: 80%;

}



  .online{

    background-color: green;

    width: 10px;

    height: 10px;

    float: right;

    border-radius: 50%;

    align-items: center;

  }



  .file{

    size: 5in;

    outline-style: none;

  }

  .post{
    border-radius: 2%;
    background-color: gray;
    /*width: 80%;*/
  }

  .bordes{
      border-radius: 15px;
  }
  .tarjeta{
    /*margin-top: 1%;
    margin-left: 5%;
    margin-right: 5%;*/
    margin-block-end: 2%;
  }
  .margenes{
    padding-top: 2%;
    padding-left: 2%;
    padding-right: 2%;
    padding-block-end: 2%;
  }
  .izquierda{
    float: left;
    position: relative;
  }
    .archivo{
      margin-block-end: 2%;
      /*margin-top: 5%;*/
      height: 12rem;
      display: block;
      background-size: cover;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }
    .archivo:hover{
      opacity: 0.8;
    }
    .textarea{
      width: 80%; 
      border-color: #dedfde;
      padding-left: 15px;
      border-radius: 15px;
      resize: none;
    }
    .file{
      /*max-width: 100%;*/
      height: 10rem;
    }

    .centro{
      
      position: relative;
      transform: translateX(1%) translateY(-12%);
    }
    #Nuevo{
      position: relative;
      transform: translateX(275%) translateY(40%);
    }
    .margenP{
      margin-top: 1%;
      margin-right: 1%;
      margin-left: 3%;
      margin-block-end: 1%;
      width: 45%;
    }
    #foro{
      margin-top: 2%;
      margin-block-end: 3%;
    }
    #asunto{
      margin-top: 1%;
      margin-block-end: 5%;
    }
    .maximo{
      white-space: nowrap;
      text-overflow: ellipsis;
      overflow: hidden;
    }

  @media screen and (max-width: 900px){
    #users{
		display: none;
	}
    #foro{
      /*padding-top: 2%;
      padding-left: 2%;*/
      margin-top: 5%;
      margin-left: 10%;
      margin-right: 5%;
      margin-block-end: 5%;
    }
    #send{
      padding-top: 4%;
    }
    .margenP{
      margin-top: 1%;
      margin-right: 1%;
      margin-left: 2%;
      margin-block-end: 1%;
      width: 85%;
    }
    #Nuevo{
      position: relative;
      transform: translateX(10%) translateY(40%);
    }
    #asunto{
      margin-top: 1%;
      margin-block-end: 5%;
    }
  }

  @media screen and (max-width: 1050px){
    #foro{
      margin-top: 5%;
      margin-left: 10%;
      margin-right: 5%;
      margin-block-end: 5%;
    }
    .margenP{
      margin-top: 1%;
      margin-right: 4%;
      margin-left: 4%;
      margin-block-end: 1%;
      width: 85%;
    }
    #Nuevo{
      position: relative;
      transform: translateX(90%) translateY(40%);
    }
    #asunto{
      margin-top: 1%;
      margin-block-end: 5%;
    }
  }

  @media screen and (max-width: 1090px){
    #foro{
      margin-top: 5%;
      margin-left: 10%;
      margin-right: 5%;
      margin-block-end: 5%;
    }
    .margenP{
      margin-top: 1%;
      margin-right: 2%;
      margin-left: 2%;
      margin-block-end: 1%;
      width: 85%;
    }
    #Nuevo{
      position: relative;
      transform: translateX(100%) translateY(40%);
    }
    #asunto{
      margin-top: 1%;
      margin-block-end: 5%;
    }
    
  }

  @media screen and (max-width: 1000px){
	#users{
		display: none;
	}
    #foro{
      margin-top: 5%;
      margin-left: 5%;
      margin-right: 1%;
      margin-block-end: 5%;
    }
    .margenP{
      margin-top: 1%;
      margin-right: 0px;
      margin-left: 5%;
      margin-block-end: 1%;
      width: 85%;
    }
    #Nuevo{
      position: relative;
      transform: translateX(85%) translateY(40%);
    }
    #asunto{
      margin-top: 1%;
      margin-block-end: 5%;
    }
    
  }
  li {
	  margin: 0px;
	  padding-left: 10px;
    list-style: none;
	}
  </style>
<script type="text/javascript">
 function tiempoReal() {
    var notificacion = $.ajax({
      url: 'recibidas.php',
      dataType: 'text',
      async: false,
    }).responseText;

    document.getElementById("notif").innerHTML = notificacion;
  } 
  setInterval(tiempoReal, 1000);
</script>
<script type="text/javascript">
  function tiempoReal() {
    var publicacion = $.ajax({
      url: 'publicaciones.php',
      dataType: 'text',
      async: false,
    }).responseText;

    document.getElementById("muroP").innerHTML = publicacion;
  } 
  setInterval(tiempoReal, 1000);
</script>
<body>

  <!-- Navigation -->

  <?php
    include_once('header.php');
    //style="left: 5%; right: 5%; padding-top: 3%; padding-block-end: 1%;"
  ?>
  <!-- Page Content -->
  <div class="container" id="foro">

        <!--<form action="" method="POST" class="g-3">
          <input type="text" class="form-control" placeholder="Escribe algo" required>
          <textarea class="textarea" autocomplete="off" name="mensaje" id="messaage" cols="47" rows="3" placeholder="Escribe tu mensaje" required></textarea>
          <button  type="submit" id="send" style="position: absolute;padding-left: 2%; padding-right: 2%; background-color: transparent; border: none;padding-top: 2%; ">
          <img src="imag/send.png" height="30px" /></button>
        </form><br/>-->
        <h1 class="text-center" style="font-family: Helvetica; font-weight:bold;">FORO</h1>
        <h4 class="text-center" style="font-family: Helvetica;">¡Bienvenidos! Únase a las discusiones.</h4>
          <center>
            <!-- Reglas -->
          <a data-toggle="modal" data-target="#rule" type="button" id="" class="btn btn-sm btn-warning text-white" style="margin-block-end: 2%; padding-left: 2%; padding-right: 2%;">Reglas&nbsp;&nbsp;
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
              <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
            </svg>
          </a>
          <!-- NUEVO POST -->
          <a data-toggle="modal" data-target="#post" type="button" id="" class="btn btn-sm btn-success text-white" style="margin-block-end: 2%; padding-left: 2%; padding-right: 2%;">Nuevo Post&nbsp;&nbsp;
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
            </svg>
          </a>
          </center>
      <!-- PUBLICACIONES CON PHP -->
      <div id="muroP" class="row"></div>
        <!-- PUBLICACIONES CON PHP -->
      
  </div>
  <!-- NUEVO POST -->
  <div class="modal fade" tabindex="-1" id="post">

      <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

          <div class="modal-header">

            <center><h4>Nuevo Post</h4></center>
            <button class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
            <form action="cambioFoto.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="newid" id="newid" value="post">

            <strong>Título</strong>
            <input type="text" class="form-control" name="titulo" required>

            <strong>Asunto</strong>
            <textarea class="form-control" name="asunto" id="asunto" cols="47" rows="5" placeholder="Asunto" required></textarea>

            <strong>Imagen</strong>
            <input type="file" class="form-control" name="archivo" required>

          </div>
          <div class="modal-footer">

          <button class='btn btn-lg btn-success btn-block text-white' type="submit">Subir</button></form>
          </div>

        </div>

      </div> 

    </div>
  <!-- NUEVO POST -->

  <!-- RULES -->
  <div class="modal fade" tabindex="-1" id="rule">

      <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

          <div class="modal-header">

            <h4>Reglas del Foro</h4>
            <button class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
            <small>- No publicar nada que no este relacionado con el propósito de esta Herramienta Web.</small><br>
            <small>- Utiliza un lenguaje apropiado.</small><br>
            <small>- Ser respetuoso y formal en tus publicaciones.</small><br>
            <small>- Ser muy claro y preciso.</small><br>
            <small>- Explica tu opinión. Justifica y argumenta.</small><br>
            <small>- Evite el uso de emoticonos y o escribir al estilo de "mensaje de texto".</small><br>
            <small>- Cuida el tono de tus expresiones.</small><br>
            <small>- Toma tus mensajes y publicaciones en serio.</small><br>
            <small>- Comentarios veraces y verificables </small><br>

          <h4>Amonestaciones</h4>
          <h6>Primera amonestación</h6>
          <li>Se eliminara tu públicación.</li>
          <h6>Segunda amonestación</h6>
          <li>Se eliminara tu publicación y tu cuenta estara suspendida durante 1 semana.</li>
          <h6>Tercera amonestación</h6>
          <li>Todas tus publicaciones seran eliminadas y tu cuenta sera baneada</li>
          </div>

        </div>

      </div> 

    </div>
  <!-- RULES -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="app.js"></script>
  
</body>
<?php 
  mysqli_close($Conexion);
  ?>
</html>

