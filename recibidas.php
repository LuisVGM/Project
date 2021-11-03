<?php
session_start();
$id = $_SESSION['id'];

    include_once("Conexion.php");
    $sql = "SELECT solicitud.idDe,solicitud.idPara,solicitud.estado,usuario.id,usuario.nombre,usuario.apellidoPaterno,usuario.apellidoMaterno,usuario.foto 
    FROM solicitud INNER JOIN usuario ON solicitud.idDe = usuario.id WHERE solicitud.estado = '0' AND solicitud.idPara = '$id'";
    $resultado= mysqli_query($Conexion,$sql);
    $totalFilas = mysqli_num_rows($resultado);
	if($totalFilas == 0){
        ?><div class="izquierda margenes">
            <h5>No tienes solicitudes</h5>
        </div><?php
              }
    while ($fila= mysqli_fetch_array($resultado) ){
      $recibe = $fila['idPara'];
      if($recibe == $_SESSION['id']){
      ?>
        <div class="izquierda margenes">
            <?php
              echo '<img class="img-responsive" src="'.$fila['foto'].'" alt="" style="border-radius: 10%; max-hight: 5%; max-width: 5%;">';
            echo "&nbsp;&nbsp;<strong><a style='color:black;' href='tipoPErfil.php?id=".$fila['id']."'>". $fila['nombre'] ." ". $fila['apellidoPaterno'] ." ". $fila['apellidoMaterno'] .
            "</a></strong><small> ha enviado una solicitud para unirse a tu equipo.</small>&nbsp;";  
            echo '<a href="solicitudes.php?opc=3&lid='.$fila['idDe'].'&id='.$_SESSION['id'].'" type="button" class="btn btn-sm btn-success text-white">Aceptar</a>&nbsp;
            <a href="solicitudes.php?opc=5&lid='.$fila['idDe'].'&id='.$_SESSION['id'].'" type="button" class="btn btn-sm btn-danger text-white">Cancelar</a><br/>';
        }
    }
        ?>
        </div>
                  