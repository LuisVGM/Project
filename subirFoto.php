<?php
    require_once('Conexion.php');
    $nom = $_REQUEST['txtnom'];
    $foto = $_FILES['foto']['name'];
    $ruta = $_FILES['foto']['tmp_name'];
    $destino = "fotos/" . $foto;
    copy($ruta,$destino);
    $sql = "INSERT INTO foto (nombre, direccion) VALUES ('$nom','$destino')";
    $result = mysqli_query($Conexion,$sql);
    header("Location: fotoPerfil.php")
?>