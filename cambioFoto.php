<?php
require_once('Conexion.php');
session_start();
    $id = $_SESSION['id'];
    $tipo = $_POST['newid'];
    
    if($tipo == "perfil"){
        $foto = $_FILES['foto']['name'];
        $ruta = $_FILES['foto']['tmp_name'];
        $destinoPerfil = "fotos/" . $foto;
        copy($ruta,$destinoPerfil);
        $sql = "UPDATE usuario SET foto = '$destinoPerfil' WHERE id = '$id'";
        $result = mysqli_query($Conexion,$sql);
        header('Location:' . getenv('HTTP_REFERER'));
    }
    if($tipo == "portada"){
        $foto = $_FILES['foto']['name'];
        $ruta = $_FILES['foto']['tmp_name'];
        $destinoPortada = "portada/" . $foto;
        copy($ruta,$destinoPortada);
        $sql = "UPDATE usuario SET portada = '$destinoPortada' WHERE id = '$id'";
        $result = mysqli_query($Conexion,$sql);
        header('Location:' . getenv('HTTP_REFERER'));
    }

    if($tipo == 'post'){
        //POST FORO
            $titulo = $_POST['titulo'];
            $asunto = $_POST['asunto'];
            $archivo = $_FILES['archivo']['name'];
            $rutaForo = $_FILES['archivo']['tmp_name'];
            $destinoforo = "archivo/" . $archivo;
        //POST FORO
        copy($rutaForo,$destinoforo);
        $sql = "INSERT INTO foro(titulo,asunto,archivo,idUsuario) VALUES ('$titulo','$asunto ','$destinoforo','$id')";
        $result = mysqli_query($Conexion,$sql);
        header('Location:' . getenv('HTTP_REFERER'));
    }
    
?>