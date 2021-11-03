<?php
error_reporting( E_ALL );
    if(isset($_POST['enviar'])){
        if(!empty($_POST['receptor']) && !empty($_POST['nombre']) && !empty($_POST['remitente']) && !empty($_POST['mensaje'])){
    //if(isset($_GET['enviar'])){
        //if(!empty($_GET['receptor']) && !empty($_GET['nombre']) && !empty($_GET['remitente']) && !empty($_GET['mensaje'])){
    /*$destino = "luisvalentingm13.101@gmail.com";
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];*/

    //$destino = $_POST['receptor'];
    /*$destino = $_GET['receptor'];
    $nombre = $_GET['nombre'];
    $email = $_GET['remitente'];
    $mensaje = $_GET['mensaje'];*/
    $destino = $_POST['receptor'];
    $nombre = $_POST['nombre'];
    $email = $_POST['remitente'];
    $mensaje = $_POST['mensaje'];

    $contenido = "Remitente: " . $nombre . "\r\nCorreo: ". $email . "\r\nMensaje: " . $mensaje;
    /*echo "hola";
    echo $contenido;*/

    mail($destino, "Correo desde University Projects", $contenido);

    echo'<script type="text/javascript">alert("Correo enviado correctamente");
		window.location.href="alumnos.php";</script>';

    /*$asunto = "Nuevo mensaje de " . $nombre;
    $mensaje = "Remitente: " . $nombre . "\r\nE-mail: " . $email . "\r\nMensaje: " . $mensaje;
    
    $cabeceras = 'From: https://universityprojectsutsv.000webhostapp.com/' . "\r\n" .
    'Reply-To: https://universityprojectsutsv.000webhostapp.com/' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    //$mail = @mail($destino, $asunto, $mensaje,$cabeceras);
    mail($destino, $asunto, $mensaje);
    echo 
    /*echo'<script type="text/javascript">alert("Correo enviado correctamente");
		window.location.href="alumnos.php";</script>';*/
    /*if($mail){
    echo'<script type="text/javascript">alert("Correo enviado correctamente");
		window.location.href="usuarios.php";</script>';
		//echo "<h4>Enviado Exitosamente</h4>" . $mail."\r\n";
		//echo $destino ." ". $asunto ." ". $mensaje;
    }else{
    echo "<h4>ERROR</h4>" . $mail;
    }*/
        }else{
        echo "Error<br>";
        //echo $_GET['receptor']."\r\n2".$_GET['nombre']."\r\n3".$_GET['remitente']."\r\n4".$_GET['mensaje'];
        echo $_POST['receptor']."\r\n2".$_POST['nombre']."\r\n3".$_POST['remitente']."\r\n4".$_POST['mensaje'];
        }
    }
?>