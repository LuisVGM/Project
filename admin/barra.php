<?php
    include_once('../Conexion.php');
    session_start();
    $sql = "SELECT * FROM usuario WHERE id = ". $_SESSION['id'].";";
    $result= mysqli_query($Conexion,$sql);

    while ($tabla= mysqli_fetch_array($result)) {
        $_SESSION['name'] = $tabla['nombre'];
        $_SESSION['apellidoP'] = $tabla['apellidoPaterno'];
        $_SESSION['apellidoM'] = $tabla['apellidoMaterno'];
    }
?>
<h3><?php //echo $_SESSION['name']." ".$_SESSION['apellidoP']." ".$_SESSION['apellidoM']; ?></h3>
<div class="barra">
    <div id="sidebar">
        <div class="toggle-btn" id="abrir">
            <span>&#9776;</span>
        </div>
        <div class="toggle-btnclose" id="close">
            <span>&#10006;</span>
        </div>
        <ul>
            <li>
                <img src="../imag/logo.jpeg" alt="Logotipo" width="100px" class="logo"><br>
                <?php echo $_SESSION['name']; ?>
            </li>
            <li><a href="inicio.php">Inicio</a></li>
            <li><a href="usuarios.php">Usuarios</a></li>
            <li><a href="#">Buzon de entrada</a></li>
            <li><a href="sesion.php">Cerrar Sesión</a></li>
        </ul>
    </div>
    
    </div>
    <div id="contenido">
        <center><h2>University Projects</h2></center>
        <center><p>UNIP</p></center>
    </div>
    <script src="main.js" charset="utf-8"></script>