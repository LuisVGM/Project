<?php
    include_once("../Conexion.php");
    $salida ="";
    $query="SELECT * FROM usuario";

    if(isset($_POST['consulta'])){
        $q = $Conexion->real_escape_string($_POST['consulta']);
        $query="SELECT nombre,apellidoPaterno,apellidoMaterno,email,idRol FROM usuario 
        WHERE nombre LIKE '%".$q."%' OR apellidoPaterno LIKE'%".$q."%' OR apellidoMaterno LIKE '%".$q."%'";

    }

    $resultado = $Conexion->query($query);

    if($resultado->num_rows>0){
        $salida.= "<table class='tabla'>
        <thead>
            <tr>
                <td>Nombre(s)</td>
                <td>Apellido Paterno</td>
                <td>Apellido Materno</td>
                <td>Email</td>
                <td>idRol</td>
            </tr>
        </thead>
        <tbody>";

        while($fila=$resultado->fetch_assoc()){
            $salida.="<tr>
                <td>".$fila['nombre']."</td>
                <td>".$fila['apellidoPaterno']."</td>
                <td>".$fila['apellidoMaterno']."</td>
                <td>".$fila['email']."</td>
                <td>".$fila['idRol']."</td>
            </tr>";
        }
        $salida.="</tbody></table>";
    }else{
        $salida.="no hay datos";
    }

    echo $salida;

    $Conexion->close();
?>