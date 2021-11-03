<?php
session_start();
    include_once('Conexion.php');
    $id = $_GET['id'];
    $lider = $_REQUEST['lid'];
    $opc = $_REQUEST['opc'];
    $vacio = '';
    //echo $id." ".$lider." ".$opc;
    //ENVIAR SOLICITUD
    if($opc == 1){
    $sql = "INSERT INTO solicitud(idDe,idPara,estado) VALUES('$id','$lider','0')";
    mysqli_query($Conexion,$sql);
    $_SESSION['equipo']=1;//SOLICITUD ENVIADA
    header("Location: ". getenv('HTTP_REFERER'));
    //header('Location: foro2.php');
    }

    //CANCELAR SOLICITUD
    if($opc == 2){
    $sql = "DELETE FROM solicitud WHERE idDe = '$id' AND idPara = '$lider';";
    mysqli_query($Conexion,$sql);
    $_SESSION['equipo']= "";//ELIMINAR SOLICITUD
    header("Location: ". getenv('HTTP_REFERER'));
    }

    //ACEPTAR SOLICITUD
    if($opc == 3){
        $sql = "UPDATE solicitud SET estado = '1' WHERE idPara = '$id';";
        mysqli_query($Conexion,$sql);
        //obtener los miembros y cantidad limite
        $proyecto = "SELECT * FROM proyecto WHERE idLider = '$id';";
        $result= mysqli_query($Conexion,$proyecto);
        while ($trabajo= mysqli_fetch_array($result)){
            $idProyecto = $trabajo['id'];
            $miembros = $trabajo['miembros'];
            $limite = $trabajo['capacidad'];
            $capacidad = $miembros + 1;
            //miembros del proyecto
            $sql = "UPDATE proyecto SET miembros = '$capacidad' WHERE idLider = '$id'";
            mysqli_query($Conexion,$sql);
            $alumno = "SELECT * FROM solicitud WHERE idPara = '$id';";
            $result= mysqli_query($Conexion,$alumno);
             while ($usuarios= mysqli_fetch_array($result)){
                 $de = $usuarios['idDe'];
            //alumnos en el proyecto
            $sql = "UPDATE alumno SET idProyecto = '$idProyecto' WHERE idUsuario = '$de'";
            mysqli_query($Conexion,$sql);
             }
        }
        $_SESSION['equipo']=2;//SOLICITUD ACEPTADA
        header("Location: ". getenv('HTTP_REFERER'));
    }

    //ELIMIAR SOLICITUD O ABANDONAR EQUIPO
    if($opc == 4){
        $sql = "DELETE FROM solicitud WHERE idDe = '$id' AND idPara = '$lider';";
        mysqli_query($Conexion,$sql);
        //eliminar proyecto del alumno
        $alumno = "UPDATE alumno SET idProyecto = NULL WHERE idUsuario  = '$id'";
        mysqli_query($Conexion,$alumno);
        //obtener cantidad de miembros
        $proyecto = "SELECT * FROM proyecto WHERE idLider = '$lider';";
        $result= mysqli_query($Conexion,$proyecto);
        while ($trabajo= mysqli_fetch_array($result)){
            $idProyecto = $trabajo['id'];
            $idLider = $trabajo['idLider'];
            $miembros = $trabajo['miembros'];
            $limite = $trabajo['capacidad'];
            $capacidad = $miembros-1;
            //echo $capacidad;
            //miembros del proyecto
            $sql = "UPDATE proyecto SET miembros = '$capacidad' WHERE idLider = '$lider'";
            mysqli_query($Conexion,$sql);
        }
        $_SESSION['equipo'] = $vacio;//ELIMINAR UNION
        header("Location: ". getenv('HTTP_REFERER'));
    }

    if($opc == 5){
        $sql = "DELETE FROM solicitud WHERE idDe = '$lider' AND idPara = '$id';";
        mysqli_query($Conexion,$sql);
        $_SESSION['equipo']=2;//ELIMINAR SOLICITUD
        header("Location: ". getenv('HTTP_REFERER'));
        }

    mysqli_close($Conexion);
?>