<!DOCTYPE html>
<?php
    include_once('../Conexion.php');
    if(isset($_POST['inputEmail']) && isset($_POST['inputPassword'])){
        $usr = $_POST['inputEmail'];
	    $pw = sha1($_POST['inputPassword']);
	    if(!$Conexion)
	    {
		    echo 'alert("Error al conectarse a la BD");';
	    }else{
	        $sql ="SELECT * FROM usuario WHERE email='$usr' and contraseña='$pw'";

	        $result= mysqli_query($Conexion,$sql);
	
	        $totalFilas = mysqli_num_rows($result);
            if($totalFilas > 0){
                while($estado = mysqli_fetch_array($result)){
                    $id=$estado['id'];
                }
                $sql = "UPDATE usuario SET estado='1' where id='$id'";
                $result= mysqli_query($Conexion,$sql);
                session_start();
                $_SESSION['usuario']=$usr;
                $_SESSION['contraseña']=$pw;
                $_SESSION['id']=$id;
                header('Location: inicio.php');
            }
            else{
                echo'<script type="text/javascript">alert("Correo o Contraseña incorrecta");
                window.location.href="iniciosesion.html";</script>';
            }
        }
    }
    
    mysqli_close($Conexion);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
    body{
        background: url(../imag/descargaUTResized.jpg);
        background-size: cover;
        background-attachment: fixed;
        overflow: hidden;
      }
      .redondo{
        border-radius: 50px;
      }

      .redondeo{
        border-radius: 20px;
        padding-top: 2%;
        width: 380px;
        padding-right: 2%;
        padding-left: 2%;
      }

      .user{
        height: 100px;
        width: 100px;
      }
      @media (max-width: 900px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
        .blanco{ 
          color: #ffffff;
        }
        .redondeo{
            width: 350px;
        }
      }
</style>
<body class="row align-items-center justify-content-center vh-100">
    <div class="text-center bg-white redondeo">
    <form class="form-signin" method="POST" action="index.php">
        <img src="../imag/perfil.png" alt="user" class="user">
  <h1 class="h3 mb-3 font-weight-normal">Iniciar Sesión</h1></br>
  <input type="email" placeholder="E-mail" name="inputEmail" class="form-control" autofocus required><br>
  <input type="password" placeholder="Contraseña" name="inputPassword" class="form-control" required><br>
  <button class='btn btn-lg btn-success btn-block text-white' type="submit">Iniciar</button>
  <center><p class="mt-5 mb-3">&copy; University Projects 2021</p></center>
  </div>
</form>
</div>
</body>
</html>