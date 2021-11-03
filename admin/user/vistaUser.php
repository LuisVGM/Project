<?php
    include_once('../../Conexion.php');
    $id = $_GET['id'];
    $rol = $_GET['rol'];
    $name = $_GET['user'];

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name ?></title>
    <link rel="stylesheet" href="vistaUser.css">
    <link rel="stylesheet" href="../style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div id="encabezado">
        <h2>University Projects</h2>
    </div>
    <div class="contenido">
        
        <?php 
            if($rol == 1){
                //BARRA O PESTAÑA DE NAVEGACIÓN
                echo '
                    <div class="navegador">
                        <a href="#" title="Perfil de usuario" class="boton activo" id="todos">Perfil</a>&nbsp;
                        <a href="#" title="Proyecto en desarrollo" class="boton" id="alumnos">Proyecto</a>&nbsp;
                        <a href="#" title="Publicaciones del usuario" class="boton" id="asesores">Publicaciones</a><br>
                        <hr>
                    </div>
                ';
                $consulta1 = "SELECT usuario.nombre, usuario.apellidoPaterno,usuario.apellidoMaterno,usuario.email,usuario.foto,usuario.portada,alumno.matricula,alumno.idPromedio,alumno.idGrupo,alumno.idNAcademico
                ,alumno.idCuatrimestre,alumno.idArea,alumno.idProyecto,alumno.idEspecialidad FROM usuario INNER JOIN alumno ON usuario.id = alumno.idUsuario
                WHERE usuario.id = '$id';";
                $result = mysqli_query($Conexion,$consulta1);
                while($usuario = mysqli_fetch_array($result)){

                    $nivelA = $usuario["idNAcademico"];
                    $cuatrimestre = $usuario["idCuatrimestre"];
                    $area = $usuario["idArea"];
                    $proyecto = $usuario["idProyecto"];
                    $especialidad = $usuario["idEspecialidad"];
                    $grupo = $usuario["idGrupo"];
                    $promedio = $usuario["idPromedio"];
                    $matricula = $usuario['matricula'];
            ?>
                <!-- PERFIL -->
                <div class="bloque activo" id="user">

                    <!-- FOTO PERFIL / PORTADA -->
                    <div class="usuario">
                        <div class="portada" style="background-image: url(<?php echo "../../".$usuario['portada']; ?>);"></div>
                        <div class="perfil" style="background-image: url(<?php echo "../../".$usuario['foto']; ?>);"></div>
                    </div>

                    <!-- NOMBRE / EMAIL -->
                    <div class="column">
                        <div class="title">
                            <h2><?php echo $usuario['nombre']." ".$usuario['apellidoPaterno']." ".$usuario['apellidoMaterno'] ?></h2>
                            <strong><?php echo $usuario['email']; ?></strong>
                        </div>
                        <div class="botones">
                            <a href="#" class="accion suspencion">Suspender</a>&nbsp;&nbsp;&nbsp;<a href="#" class="accion baja">Dar de baja</a>
                        </div>
                    </div>

                    <!-- DATOS -->
                    <div class="lista">
                        <!-- P R I M E R A L I S T A -->
                        <div class="datos">
                            <strong>Nivel Académico</strong>
                            <?php 
                                //N I V E L A C A D E M I C O
                                $consulta = "SELECT descripcion FROM nivelacademico WHERE id = '$nivelA'";
                                $result = mysqli_query($Conexion,$consulta);
                                $Academico = mysqli_fetch_array($result);
                                $nivelAcademico = $Academico['descripcion'];
                                echo "<p>".$nivelAcademico."</p>";
                            ?>
                            <strong>Cuatrimestre</strong>
                            <?php 
                                //C U A T R I M E S T R E
                                $consulta = "SELECT nombre FROM cuatrimestre WHERE id = '$cuatrimestre'";
                                $result = mysqli_query($Conexion,$consulta);
                                $grado = mysqli_fetch_array($result);
                                $cuatri = $grado['nombre'];
                                echo "<p>".$cuatri."</p>";
                            ?>
                            <strong>Grupo</strong>
                            <?php 
                                //G R U P O
                                $consulta = "SELECT grupo FROM grupo WHERE id = '$grupo'";
                                $result = mysqli_query($Conexion,$consulta);
                                $num = mysqli_fetch_array($result);
                                $group = $num['grupo'];
                                echo "<p>".$group."</p>";
                            ?>
                            <strong>Matricula</strong>
                            <?php 
                                //M A T R I C U L A
                                echo "<p>".$matricula."</p>";
                            ?>
                        </div>
                        <!-- S E G U N D A L I S T A -->
                        <div class="datos">
                            <strong>Especialidad</strong>
                            <?php 
                                //E S P E C I A L I D A D
                                $consulta = "SELECT especialidad FROM especialidad WHERE id = '$especialidad'";
                                $result = mysqli_query($Conexion,$consulta);
                                $especial = mysqli_fetch_array($result);
                                $specialty = $especial['especialidad'];
                                echo "<p>".$specialty."</p>";
                            ?>
                            <strong>Área</strong>
                            <?php 
                                //A R E A
                                $consulta = "SELECT nombreArea FROM area WHERE id = '$area'";
                                $result = mysqli_query($Conexion,$consulta);
                                $carrera = mysqli_fetch_array($result);
                                $Area = $carrera['nombreArea'];
                                echo "<p>".$Area."</p>";
                            ?>
                            <strong>Promedio</strong>
                            <?php 
                                //P R O M E D I O
                                $consulta = "SELECT promedio FROM promedio WHERE id = '$promedio'";
                                $result = mysqli_query($Conexion,$consulta);
                                $promed = mysqli_fetch_array($result);
                                $media = $promed['promedio'];
                                echo "<p>".$media."</p>";
                            ?>
                        </div>
                    </div>
                </div>
                <!-- /PERFIL -->

                <div class="bloque">

                    <!-- F O T O / N A M E - P R O Y E C T O -->
                    <div class="titleProyecto">
                        <?php 
                            $consult2 = "SELECT nombre,descripcion,idLider,capacidad,miembros,foto,idAsesor FROM proyecto WHERE id = '$proyecto'";
                            $result2 = mysqli_query($Conexion,$consult2);
                            while($project = mysqli_fetch_array($result2)){
                                $lider = $project['idLider'];
                                $miembros = $project['miembros'];
                                $asesor = $project['idAsesor'];
                        ?>
                            <!-- F O T O - P R O Y E C T O -->
                            <div class="fotoProject" style="background-image: url(<?php echo "../../".$project['foto'] ?>);"></div>
                            <div class="nombreP">
                                <!-- T I T U L O - P R O Y E C T O -->
                                <h2><?php echo $project['nombre']; ?></h2>
                                <div class="descripcion">
                                    <!-- D E S C R I P C I O N - P R O Y E C T O -->
                                    <p><?php echo $project['descripcion']; ?></p>
                                </div>
                            </div>
                            
                        <?php } ?>
                    </div>
                    <!-- I N T E G R A N T E S - P R O Y E C T O -->
                    <div class="integrantes">
                        <div id="asesor">
                            <h2>Asesor de proyecto</h2>
                        </div>
                        <hr style="border-color:#000;">
                        <?php 
                            //V E R I F I C A R - A S E S O R - D E - P R O Y E C T O
                            
                                $consultAsesor = "SELECT usuario.id,usuario.nombre,usuario.apellidoPaterno,usuario.apellidoMaterno,usuario.foto,
                                maestro.id, maestro.idProyecto FROM usuario INNER JOIN maestro ON usuario.id = maestro.idUsuario INNER JOIN 
                                proyecto ON proyecto.idAsesor = maestro.id WHERE maestro.idProyecto = '$proyecto'";
                                $resultado = mysqli_query($Conexion,$consultAsesor);
                                $totalFilas = mysqli_num_rows($resultado);
                                $asesorP = mysqli_fetch_array($resultado);
                                    if($totalFilas > 0){?>
                                    <div class="miembro">
                                        <div class="fotoUser" style="background-image: url(<?php echo "../../".$asesorP['foto']; ?>);"></div>
                                        <div class="nameUser">
                                            <a href="#"><?php echo $asesorP['nombre']." ". $asesorP['apellidoPaterno']." ". $asesorP['apellidoMaterno']; ?></a>
                                            <p><?php //echo $integrantes['nombreArea']; ?></p>
                                        </div>
                                    </div>
                                <?php 
                            }elseif($totalFilas == 0){
                                echo "<p style='font-size: 3vh;'>El proyecto no cuenta con un asesor.</p>";
                            }
                        ?>
                        <div id="alumnos">
                            <h2>Integrantes del equipo</h2>
                            <p><?php echo $miembros." "; ?>Alumnos</p>
                        </div>
                        <hr style="border-color:#000;">
                    <?php
                        $consult3 = "SELECT usuario.id,usuario.nombre,usuario.apellidoPaterno,usuario.apellidoMaterno,usuario.foto,alumno.idUsuario, 
                        alumno.idArea,area.nombreArea FROM usuario INNER JOIN alumno ON usuario.id = alumno.idUsuario 
                        INNER JOIN area ON alumno.idArea = area.id WHERE alumno.idProyecto = '$proyecto';";
                        $resultado = mysqli_query($Conexion,$consult3);
                        while($integrantes = mysqli_fetch_array($resultado)){
                            $userArea = $integrantes['idArea'];
                    ?>
                        <div class="miembro">
                            <div class="fotoUser" style="background-image: url(<?php echo "../../".$integrantes['foto']; ?>);"></div>
                            <div class="nameUser">
                                <a href="#"><?php echo $integrantes['nombre']." ". $integrantes['apellidoPaterno']." ". $integrantes['apellidoMaterno']; ?></a>
                                <p><?php echo $integrantes['nombreArea']; ?></p>
                            </div>
                        </div>
                        <hr>
                    <?php } ?>
                    </div>
                    
                </div>
                <div class="bloque">
                    <!-- P U B L I C A C I O N E S -->
                    <div class="muro">
                    <?php 
                        $consult4 = "SELECT foro.id,foro.titulo,foro.asunto,foro.archivo,foro.fecha,foro.idUsuario
                        ,usuario.id,usuario.nombre,usuario.apellidoPaterno,usuario.apellidoMaterno,usuario.foto 
                        FROM foro INNER JOIN usuario ON foro.idUsuario = usuario.id WHERE foro.idUsuario = '$id';";
                        $result = mysqli_query($Conexion,$consult4);
                        $totalFilas = mysqli_num_rows($result);
                        if($totalFilas > 0){
                        while($publicacion = mysqli_fetch_array($result)){
                    ?>
                    
                        <div class="post">
                            <!-- D A T O S - A U T O R -->
                            <div class="autor">
                                <div class="imgAutor" style="background-image: url(<?php echo "../../".$publicacion['foto']; ?>);"></div>
                                <div class="nameAutor">
                                    <strong><?php echo $publicacion['nombre']." ".$publicacion['apellidoPaterno']." ".$publicacion['apellidoMaterno']; ?></strong>
                                    <p><?php echo $publicacion['fecha']; ?></p>
                                    
                                </div>
                                <div class="opc"><a href="#" class="opt"><img src="../../imag/settings_black_24dp.svg" alt="opc" style="width: 4vh;height: 4vh;"></a></div>
                            </div>
                            <!-- D E S C R I P C I O N -->
                            <div class="desPost">
                                <div class="tituloPost">
                                    <strong><?php echo $publicacion['titulo']; ?></strong>
                                </div>
                                <div class="descripcionPost">
                                    <p><?php echo $publicacion['asunto']; ?></p>
                                </div>
                            </div>
                            <!-- I M A G E N - P U B L I C A C I O N -->
                            <div class="imgPost">
                                <div class="fotoPost" style="background-image: url(<?php echo "../../".$publicacion['archivo']; ?>);"></div>
                            </div>
                        </div><br>
                        <?php
                            }
                        }elseif($totalFilas == 0){
                            echo "<h2 style='font-size: 5vh; text-align: center;'>Este usuario no ha realizado ninguna publicación.</h2>";
                        }
                        ?>
                        
                    </div>
                </div>
            <?php
                }
            }
            elseif($rol == 2){
                echo '
                    <div class="navegador">
                        <a href="#" title="Todos los Usuarios" class="boton activo" id="todos">Perfil</a>&nbsp;
                        <a href="#" title="Alumnos" class="boton" id="alumnos">Proyecto Asesorado</a>&nbsp;
                        <a href="#" title="Asesores" class="boton" id="asesores">Publicaciones</a><br>
                        <hr>
                    </div>
                ';
                $consulta1 = "SELECT usuario.nombre, usuario.apellidoPaterno,usuario.apellidoMaterno,usuario.email,usuario.foto,usuario.portada,
                maestro.idAsignatura,maestro.idAsignatura2,maestro.idAsignatura3,maestro.idAsignatura4,maestro.idEspecialidad,
                maestro.idArea,maestro.idNA,maestro.id,maestro.idProyecto FROM usuario INNER JOIN maestro ON usuario.id = maestro.idUsuario 
                WHERE usuario.id = '$id';";
                $result = mysqli_query($Conexion,$consulta1);
                while($profesor = mysqli_fetch_array($result)){
                    $idAsignatura1 = $profesor['idAsignatura'];
                    $idAsignatura2 = $profesor['idAsignatura2'];
                    $idAsignatura3 = $profesor['idAsignatura3'];
                    $idAsignatura4 = $profesor['idAsignatura4'];
                    $idEspecialidad = $profesor['idEspecialidad'];
                    $idArea = $profesor['idArea'];
                    $idNA = $profesor['idNA'];
                    $idMaestro = $profesor['id'];
                    $idProyecto = $profesor['idProyecto'];
                    
            ?>
                <!-- PERFIL -->
                <div class="bloque activo" id="user">

                    <!-- FOTO PERFIL / PORTADA -->
                    <div class="usuario">
                        <div class="portada" style="background-image: url(<?php echo "../../".$profesor['portada']; ?>);"></div>
                        <div class="perfil" style="background-image: url(<?php echo "../../".$profesor['foto']; ?>);"></div>
                    </div>

                    <!-- NOMBRE / EMAIL -->
                    <div class="column">
                        <div class="title">
                            <h2><?php echo $profesor['nombre']." ".$profesor['apellidoPaterno']." ".$profesor['apellidoMaterno'] ?></h2>
                            <strong><?php echo $profesor['email']; ?></strong>
                        </div>
                        <div class="botones">
                            <a href="#" class="accion suspencion">Suspender</a>&nbsp;&nbsp;&nbsp;<a href="#" class="accion baja">Dar de baja</a>
                        </div>
                    </div>

                    <!-- DATOS -->
                    <div class="lista">
                        <!-- P R I M E R A L I S T A -->
                        <div class="datos">
                            <strong>Nivel Académico</strong>
                            <?php 
                                //N I V E L A C A D E M I C O
                                $consulta = "SELECT descripcion FROM nivelacademico WHERE id = '$idNA'";
                                $result = mysqli_query($Conexion,$consulta);
                                $Academico = mysqli_fetch_array($result);
                                $nivelAcademico = $Academico['descripcion'];
                                echo "<p>".$nivelAcademico."</p>";
                            ?>
                            <!--<strong>Matricula</strong>-->
                            <?php 
                                //M A T R I C U L A
                                //echo "<p>".$matricula."</p>";
                            ?>
                            <strong>Especialidad</strong>
                            <?php 
                                //E S P E C I A L I D A D
                                $consulta = "SELECT especialidad FROM especialidad WHERE id = '$idEspecialidad'";
                                $result = mysqli_query($Conexion,$consulta);
                                $especial = mysqli_fetch_array($result);
                                $specialty = $especial['especialidad'];
                                echo "<p>".$specialty."</p>";
                            ?>
                            <strong>Área</strong>
                            <?php 
                                //A R E A
                                $consulta = "SELECT nombreArea FROM area WHERE id = '$idArea'";
                                $result = mysqli_query($Conexion,$consulta);
                                $carrera = mysqli_fetch_array($result);
                                $Area = $carrera['nombreArea'];
                                echo "<p>".$Area."</p>";
                            ?>
                        </div>
                        <!-- S E G U N D A L I S T A -->
                        <div class="datos">
                            
                            
                            <!--<strong>Promedio</strong>-->
                            <?php 
                                //P R O M E D I O
                                /*$consulta = "SELECT promedio FROM promedio WHERE id = '$promedio'";
                                $result = mysqli_query($Conexion,$consulta);
                                $promed = mysqli_fetch_array($result);
                                $media = $promed['promedio'];
                                echo "<p>".$media."</p>";*/
                            ?>
                            <strong>Asignatura</strong>
                            <?php
                             $sql ="SELECT asignatura FROM asignatura WHERE id='$idAsignatura1';";
                             $result= mysqli_query($Conexion,$sql);
                             $asignatura= mysqli_fetch_array($result); 
                             echo "<p>".$asignatura['asignatura']."</p>";
                             //VERIFICACION DE EXISTENCIA DE ASIGNATURA 2
                             $sql ="SELECT asignatura FROM asignatura WHERE id='$idAsignatura2';";
                             $result= mysqli_query($Conexion,$sql);
                             $asignatura= mysqli_fetch_array($result); 
                             if($idAsignatura2 != "")
                             echo "<p>".$asignatura['asignatura']."</p>"; 
                             //VERIFICACION DE EXISTENCIA DE ASIGNATURA 
                             $sql ="SELECT asignatura FROM asignatura WHERE id='$idAsignatura3';";
                             $result= mysqli_query($Conexion,$sql);
                             $asignatura= mysqli_fetch_array($result); 
                             if($idAsignatura3 != "")
                             echo "<p>".$asignatura['asignatura']."</p>";
                             //VERIFICACION DE EXISTENCIA DE ASIGNATURA 4
                             $sql ="SELECT asignatura FROM asignatura WHERE id='$idAsignatura4';";
                             $result= mysqli_query($Conexion,$sql);
                             $asignatura= mysqli_fetch_array($result);
                             if($idAsignatura4 != "")
                             echo "<p>".$asignatura['asignatura']."</p>"; 
                            ?>
                        </div>
                    </div>
                </div>
                <!-- /PERFIL -->

                <div class="bloque">

                    <!-- F O T O / N A M E - P R O Y E C T O -->
                    <div class="titleProyecto">
                        <?php 
                            $consult2 = "SELECT nombre,descripcion,idLider,capacidad,miembros,foto,idAsesor FROM proyecto WHERE id = '$idProyecto'";
                            $result2 = mysqli_query($Conexion,$consult2);
                            $totalFilas1 = mysqli_num_rows($result2);
                            if($totalFilas1 > 0){
                            while($project = mysqli_fetch_array($result2)){
                                $lider = $project['idLider'];
                                $miembros = $project['miembros'];
                                $asesor = $project['idAsesor'];
                        ?>
                            <!-- F O T O - P R O Y E C T O -->
                            <div class="fotoProject" style="background-image: url(<?php echo "../../".$project['foto'] ?>);"></div>
                            <div class="nombreP">
                                <!-- T I T U L O - P R O Y E C T O -->
                                <h2><?php echo $project['nombre']; ?></h2>
                                <div class="descripcion">
                                    <!-- D E S C R I P C I O N - P R O Y E C T O -->
                                    <p><?php echo $project['descripcion']; ?></p>
                                </div>
                            </div>
                            
                        <?php 
                            } 
                        
                        ?>
                    </div>
                    <!-- I N T E G R A N T E S - P R O Y E C T O -->
                    <div class="integrantes">
                        <div id="asesor">
                            <h2>Asesor de proyecto</h2>
                        </div>
                        <hr style="border-color:#000;">
                        <?php 
                            //V E R I F I C A R - A S E S O R - D E - P R O Y E C T O
                            
                                $consultAsesor = "SELECT usuario.id,usuario.nombre,usuario.apellidoPaterno,usuario.apellidoMaterno,usuario.foto,
                                maestro.id, maestro.idProyecto FROM usuario INNER JOIN maestro ON usuario.id = maestro.idUsuario INNER JOIN 
                                proyecto ON proyecto.idAsesor = maestro.id WHERE maestro.idProyecto = '$idProyecto'";
                                $resultado = mysqli_query($Conexion,$consultAsesor);
                                $totalFilas = mysqli_num_rows($resultado);
                                $asesorP = mysqli_fetch_array($resultado);
                                    if($totalFilas > 0){?>
                                    <div class="miembro">
                                        <div class="fotoUser" style="background-image: url(<?php echo "../../".$asesorP['foto']; ?>);"></div>
                                        <div class="nameUser">
                                            <a href="#"><?php echo $asesorP['nombre']." ". $asesorP['apellidoPaterno']." ". $asesorP['apellidoMaterno']; ?></a>
                                            <p><?php //echo $integrantes['nombreArea']; ?></p>
                                        </div>
                                    </div>
                                <?php 
                            }elseif($totalFilas == 0){
                                echo "<p style='font-size: 3vh;'>El proyecto no cuenta con un asesor.</p>";
                            }
                        ?>
                        <div id="alumnos">
                            <h2>Integrantes del equipo</h2>
                            <p><?php echo $miembros." "; ?>Alumnos</p>
                        </div>
                        <hr style="border-color:#000;">
                    <?php
                        $consult3 = "SELECT usuario.id,usuario.nombre,usuario.apellidoPaterno,usuario.apellidoMaterno,usuario.foto,alumno.idUsuario, 
                        alumno.idArea,area.nombreArea FROM usuario INNER JOIN alumno ON usuario.id = alumno.idUsuario 
                        INNER JOIN area ON alumno.idArea = area.id WHERE alumno.idProyecto = '$idProyecto';";
                        $resultado = mysqli_query($Conexion,$consult3);
                        while($integrantes = mysqli_fetch_array($resultado)){
                            $userArea = $integrantes['idArea'];
                    ?>
                        <div class="miembro">
                            <div class="fotoUser" style="background-image: url(<?php echo "../../".$integrantes['foto']; ?>);"></div>
                            <div class="nameUser">
                                <a href="#"><?php echo $integrantes['nombre']." ". $integrantes['apellidoPaterno']." ". $integrantes['apellidoMaterno']; ?></a>
                                <p><?php echo $integrantes['nombreArea']; ?></p>
                            </div>
                        </div>
                        <hr>
                    <?php }
                    }elseif($totalFilas1 == 0){
                        echo "<h2 style='font-size: 5vh; text-align: center;'>El usuario no asesora ningun proyecto.</h2>";
                    }  ?>
                    </div>
                    
                </div>

                <div class="bloque">
                    <!-- P U B L I C A C I O N E S -->
                    <div class="muro">
                    <?php 
                        $consult4 = "SELECT foro.id,foro.titulo,foro.asunto,foro.archivo,foro.fecha,foro.idUsuario
                        ,usuario.id,usuario.nombre,usuario.apellidoPaterno,usuario.apellidoMaterno,usuario.foto 
                        FROM foro INNER JOIN usuario ON foro.idUsuario = usuario.id WHERE foro.idUsuario = '$id';";
                        $result = mysqli_query($Conexion,$consult4);
                        $totalFilas = mysqli_num_rows($result);
                        if($totalFilas > 0){
                        while($publicacion = mysqli_fetch_array($result)){
                    ?>
                    
                        <div class="post">
                            <!-- D A T O S - A U T O R -->
                            <div class="autor">
                                <div class="imgAutor" style="background-image: url(<?php echo "../../".$publicacion['foto']; ?>);"></div>
                                <div class="nameAutor">
                                    <strong><?php echo $publicacion['nombre']." ".$publicacion['apellidoPaterno']." ".$publicacion['apellidoMaterno']; ?></strong>
                                    <p><?php echo $publicacion['fecha']; ?></p>
                                    
                                </div>
                                <div class="opc"><a href="#" class="opt"><img src="../../imag/settings_black_24dp.svg" alt="opc" style="width: 4vh;height: 4vh;"></a></div>
                            </div>
                            <!-- D E S C R I P C I O N -->
                            <div class="desPost">
                                <div class="tituloPost">
                                    <strong><?php echo $publicacion['titulo']; ?></strong>
                                </div>
                                <div class="descripcionPost">
                                    <p><?php echo $publicacion['asunto']; ?></p>
                                </div>
                            </div>
                            <!-- I M A G E N - P U B L I C A C I O N -->
                            <div class="imgPost">
                                <div class="fotoPost" style="background-image: url(<?php echo "../../".$publicacion['archivo']; ?>);"></div>
                            </div>
                        </div><br>
                        <?php
                            }
                        }elseif($totalFilas == 0){
                            echo "<h2 style='font-size: 5vh; text-align: center;'>Este usuario no ha realizado ninguna publicación.</h2>";
                        }
                        ?>
                        
                    </div>
                </div>
            <?php
                }
            }
        ?>
    </div>

    <script src="../script.js" charset="utf-8"></script>
</body>
</html>