<?php
session_start();
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
?>