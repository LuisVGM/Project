<?php
    session_start();
    include_once('Conexion.php');
    $Id =$_GET['id'];
    $_SESSION['idUsers'] = $Id;
    $sql="SELECT * FROM usuario WHERE id='$Id'";
    $ejecutar= mysqli_query($Conexion,$sql);
    if (!$ejecutar){
      echo'<script type="text/javascript">alert("error");
	window.location.href="editar.php";</script>';
    }else{
        while ($tabla= mysqli_fetch_array($ejecutar)) {
            $_SESSION['verP'] = $tabla['idRol'];
        }
        if(isset($_SESSION['verP'])){
            switch($_SESSION['verP']){
                case 1:
                    if($Id == $_SESSION['id']){
                        header('Location: perfilUser.php');
                    }else{
                    header('Location: view-profile.php');
                    }
                break;
    
                case 2:
                    if($Id == $_SESSION['id']){
                        header('Location: perfil.php');
                    }else{
                    header('Location: view-profileP.php');
                    }
                break;
    
                case 3:
                    header('Location: perfilUser.php');
                break;
            }
        }
    }
?>