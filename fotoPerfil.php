<!doctype html>
<html>
    <body>
    <p>INSERTAR FOTO</p><br/>
        <form action="subirFoto.php" method="POST" enctype="multipart/form-data">
            <strong>Nombre: </strong><input type="text" name="txtnom" value=""><br/><br/>
            <strong>Foto: </strong><input type="file" name="foto" id="foto"><br/><br/>
            <input type="submit" name="enviar" value="Enviar">
        </form>
        <br/>
        <?php
            require_once("Conexion.php");
            $sql = "SELECT * FROM foto";
            $result = mysqli_query($Conexion,$sql);
            while($fila = mysqli_fetch_array($result)){
                echo '<img class="img-responsive" src="'.$fila["direccion"].'" alt="" width="100" height="150" style="border-radius: 25%;"><br/>';
            //https://www.xvideos.com/video54343183/niche_parade_-_showed_prostitute_lexxi_lo_my_dick_and_she_gave_me_a_handjob
        /* 
        <h6>Foto de Perfil</h6>
                  <input type="file" name="foto" id="foto">
        */    
        }
        ?>
    </body>
</html>

