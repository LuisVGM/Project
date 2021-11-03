<?php
	include_once("Conexion.php");
	session_start();
	$id=$_SESSION['id'];

        $select="SELECT * FROM usuario WHERE estado='1' AND id!='$id'";

        $ejecutar= mysqli_query($Conexion,$select);
        echo "<center><h5>Usuarios Conectados</h5></center>";
        $totalFilas = mysqli_num_rows($ejecutar);
	//echo $totalFilas;
	//exit();
	if($totalFilas == 0){
		echo "<center><h6>No hay usuarios conectados</h6></center>";
	}
        while ($tabla= mysqli_fetch_array($ejecutar)) {  
      ?>

        <h6><?php echo $tabla['nombre'].' '.$tabla['apellidoPaterno'].' '.$tabla['apellidoMaterno'] ?><div class="online"></div></h6>

     <?php 
  			}
  	?>
  	