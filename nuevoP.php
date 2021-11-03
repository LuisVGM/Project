<?php
    include_once('Conexion.php');
    $id = $_POST['newid'];
    $nombre = $_POST['nombreP'];
    $descripción = $_POST['descripcion'];
    $foto = $_FILES['foto']['name'];
    $ruta = $_FILES['foto']['tmp_name'];
    $destino = "fotosProyectos/" . $foto;
    copy($ruta,$destino);

    $sql = "INSERT INTO proyecto(nombre,descripcion,idLider,foto) VALUES ('$nombre','$descripción','$id','$destino')";
    $consulta2 = mysqli_query($Conexion, $sql);

    $sql = "SELECT * FROM proyecto WHERE idLider=$id";
    $consulta2 = mysqli_query($Conexion, $sql);
    $totalFilas = mysqli_num_rows($consulta2);
	//echo $totalFilas;
	//exit();
	if($totalFilas > 0){
		while($estado = mysqli_fetch_array($consulta2)){
			$idP=$estado['id'];
		}
        $sql = "UPDATE alumno SET idProyecto='$idP' WHERE idUsuario = '$id';";
        $consulta2 = mysqli_query($Conexion, $sql);

        if (!$consulta2){
            echo'<script type="text/javascript">alert("Error al agregar el proyecto");
        window.location.href="tipouser.php";</script>';
        }else{
            echo'<script type="text/javascript">alert("Tu proyecto fue guardado correctamente");
            window.location.href="tipouser.php";</script>';
        //header('Location: iniciosesion.html');
        }
    }
    
    //cerrar la conexion
    mysqli_close($Conexion);
?>