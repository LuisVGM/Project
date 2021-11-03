<?php
include_once("Conexion.php");
session_start();
    $sql = "SELECT foro.titulo,foro.asunto,foro.archivo,foro.fecha,foro.idUsuario,foro.id,usuario.nombre,usuario.apellidoPaterno,usuario.apellidoMaterno,usuario.foto
    FROM foro INNER JOIN usuario WHERE foro.idUsuario = usuario.id ORDER BY foro.id DESC";
    $result= mysqli_query($Conexion,$sql);
    $totalFilas = mysqli_num_rows($result);
    if($totalFilas < 1){
      echo "<h1 class='text-center'>NO HAY PUBLICACIONES, SE EL PRIMERO EN INICIAR UNA SALA</h1>";
  }elseif($totalFilas > 0){
    while ($public= mysqli_fetch_array($result)) {
    ?>
        <div class='card  margenP' style="width: 20rem; border-radius: 10px;">
          <div class='tarjeta'>
          <?php echo "<a href='new.php?id=".$public['id']."&user=".$public['idUsuario']."'>";?>
          <!-- IMAGEN DE FONDO -->
          <div class="archivo" id="archivo" style="background-image: url(<?php echo $public['archivo'] ?>);">
              <!--<center><?php //echo "<a href='post.php?id=".$public['id']."&user=".$public['idUsuario']."'>";?><img class="file" src="<?php echo $public['file'] ?>" alt=""><?php echo "</a>"; ?></center>-->
            </div><?php echo "</a>"; ?>
            <!-- IMAGEN DE FONDO -->
            <div class="" id="asunto" style="padding-left: 2%;">
            <div class="maximo"><strong><?php echo $public['titulo'] ?></strong></div>
            <div class="maximo"><small ><?php echo $public['asunto'] ?></small></div>
            </div>
            <div class='row margenesA centro' id="fotoPerfil">
              <!-- IMAGEN -->
              <!--<img class="centro" src="<?php echo $public['foto'] ?>" width="40px" alt="" style="border-radius: 50%; right: 2%;">-->
              <div class=" limite" style="background-image: url(<?php echo $public['foto'] ?>)"></div>
              <div class=' pad' id="persona">
              <strong style="word-wrap: break-word;"><?php echo "<a href='tipoPErfil.php?id=".$public['idUsuario']."' style='color: black;'>".$public['nombre']." ".$public['apellidoPaterno']." ".$public['apellidoMaterno']."</a>" ?></strong><br>
              <small><?php echo $public['fecha'] ?></small>
            
            <?php 
              //COMPROBAR AUTOR DE LA PUBLICACIÓN
                if($_SESSION['id'] == $public['idUsuario']){ 
                    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" style="float: right; color: black;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                    </svg>
                    </a>'; 
                } ?>
            </div>
            
            </div>
            
          </div>
        </div>
    <?php
          }
        }
        
    ?>
        <!-- PUBLICACIONES CON PHP -->