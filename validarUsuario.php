<?php
	include "Conexion.php";
	error_reporting(~E_ALL);
	//error_reporting(~E_ALL);
	//Creamos un objeto de la clase conexion
	/*$miconexion = new Conexion();*/
	$usr = $_POST['inputEmail'];
	$pw = sha1($_POST['inputPassword']);
	if(!$Conexion)
	{
		echo 'alert("Error al conectarse a la BD");';
	}else{
	$sql ="SELECT * FROM usuario WHERE email='$usr' and contraseña='$pw'";

	$result= mysqli_query($Conexion,$sql);
	
	$totalFilas = mysqli_num_rows($result);
	//echo $totalFilas;
	//exit();
	if($totalFilas > 0){
		while($estado = mysqli_fetch_array($result)){
			$id=$estado['id'];
			$userRol = $estado['idRol'];
			//$_SESSION['name']= $estado['nombre'];
		}
		$sql = "UPDATE usuario SET estado='1' where id='$id'";
		$result= mysqli_query($Conexion,$sql);
		session_start();
		$_SESSION['usuario']=$usr;
		$_SESSION['contraseña']=$pw;
		$_SESSION['id']=$id;
		$_SESSION['Rol']=$userRol;
		if(isset($_SESSION['Rol'])){
			switch($_SESSION['Rol']){
				case 1:
					header('Location: perfilUser.php');
				break;

				case 2:
					header('Location: perfil.php');
				break;

				case 3:
					header('Location: perfilUser.php');
				break;
			}
		}
		//header('Location: perfilUser.php');
	}else{
		echo'<script type="text/javascript">alert("Correo o Contraseña incorrecta");
		window.location.href="diseño/login.html";</script>';
	}
	}

	mysqli_close($Conexion);
?>
                    
