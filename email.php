<?php
    session_start();
    $destino = $_GET['id'];
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Send Email</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      .redondeo{
        border-radius: 20px;
        padding-top: 30px;
        padding-left: 30px;
        padding-right: 30px;
        padding-block-end: 30px;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
        .blanco{ 
          color: #ffffff;
        }
        
      }
      #textarea{
          width: 100%;
          margin: auto;
          margin-top: 5px;
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="row align-items-center justify-content-center vh-100">
  <div class="text-center col-sm-6 bg-white redondeo">
  <form method="POST" action="sendCorreo.php">
    <!-- DESTINO -->
    <label class="h4 mb-3 font-weight-normal">Para</label><br/>
    <input type="text" disabled="false" class="form-control" id="nombre" name="nombre" placeholder="Destinatario" value="<?php echo $destino ?>">
    <!-- REMITENTE -->
    <label for="primernombre" class="h4 mb-3 font-weight-normal">Nombre</label>
    <input type="hidden" name="receptor" id="receptor" value="<?php echo $destino; ?>"> 
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $_SESSION['name'] . " " . $_SESSION['apellidoP'] . " " .$_SESSION['apellidoM']; ?>" required>
      <br/>
    <!-- EMAIL REMITENTE -->
      <label for="apellidopaterno" class="h4 mb-3 font-weight-normal">De</label></br>
    <input type="email" disabled="false" class="form-control" id="email" name="email" placeholder="E-mail" value="<?php echo $_SESSION['usuario']; ?>" required>
    <input type="hidden" name="remitente" value="<?php echo $_SESSION['usuario']; ?>">  
    <br/>
      <!-- MENSAJE -->
    <textarea class="form-control" name="mensaje" id="textarea" cols="47" rows="5" placeholder="Redactar un correo" required></textarea><br/>
      <br/>
    <button class="btn btn-lg btn-success btn-block" type="submit" name="enviar">Enviar Mensaje</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
  </form><?//php include_once('sendCorreo.php'); ?>
  </div>
    </body>
    </html>