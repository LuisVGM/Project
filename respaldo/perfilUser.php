<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Perfil</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

  <link href="css/blog.rtl.css" rel="stylesheet">

</head>
<style>
  .fond {
    background-image: url(mex-fet.jpg);
  }
  
</style>
<body>
<?php
    include "Conexion.php";
    //RETOMAMOS LA SESION QUE ESTA INICIADA
    session_start();
    //SI NO HAY INICIADA UNA SESION REDIRIGIRA AL INDEX
    if(!isset($_SESSION["usuario"])){
        header('Location: index.html');
    }
    $usr = $_SESSION["usuario"];
    $sql ="SELECT * FROM usuario WHERE correoInstitucional='$usr'";
    $result= mysqli_query($Conexion,$sql);
    while ($tabla= mysqli_fetch_array($result)) {
        $idUser=$tabla['id'];
        //TABLA ALUMNO
        $sql ="SELECT * FROM alumno WHERE idUsuario ='$idUser'";
        $result= mysqli_query($Conexion,$sql);
        while ($alumno= mysqli_fetch_array($result)) {
            $idA=$alumno['idArea'];
            $idNA=$alumno['idNivelA'];
            $idC=$alumno['idCuatrimestre'];
            //TABLA AREA
            $sql ="SELECT * FROM area WHERE idArea ='$idA'";
            $result= mysqli_query($Conexion,$sql);
            while ($area= mysqli_fetch_array($result)) {
                $sql ="SELECT * FROM cuatrimestre WHERE idCuatrimestre ='$idC'";
                $result= mysqli_query($Conexion,$sql);
                while ($cuatri= mysqli_fetch_array($result)) {
                    $sql ="SELECT * FROM nivelacademico WHERE idNivelAcademico ='$idNA'";
                    $result= mysqli_query($Conexion,$sql);
                    while ($nivel= mysqli_fetch_array($result)) {
?>
  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container bg-dark">
      <img src="logo.jpeg" alt="" width="60" height="60">
      <a class="navbar-brand" href="perfilUser.php">University Projects</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="http://www.utsv.com.mx/">UTSV</a>
          </li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="asesores.php">Asesores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="select.php">Administración</a>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="foro.php">Foro</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Perfil
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
              <a class="dropdown-item" href="perfilUser.php">Ver Perfil</a>
              <a class="dropdown-item" href="sesion.php">Cerrar Sesión</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Perfil</h1>

    <!-- Image Header -->
    <div class="container">

      <!-- TI -->
      <div class="card mb-4 fond">
        <div class="card-body">
          <center><h2 class="card-title"><?php echo $tabla['primerNombre'] ." ". $tabla['segundoNombre'] ." ". $tabla['apellidoPaterno'] ." ". $tabla['apellidoMaterno']; ?></h2>
          
          <img src="perfil.png" alt="" width="190" height="190" >
        </center>
        </div>
      </div>

    <!-- Marketing Icons Section -->
    <main class="container">
    <div class="row mb-2">
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden  mb-4 shadow-sm position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Correo Electronico</strong>
          <h6 class="mb-0"><?php echo $tabla['correoInstitucional'] ?></h6>
        </div>
        <div class="col-auto d-none d-lg-block">
          <!--<svg class="bd-placeholder-img" width="110" height="110" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: HOLA" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Hola</text></svg>-->
            <img src="https://www.pngkey.com/png/detail/333-3330465_imagen-de-el-correo.png" width="110" height="110">
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Matricula</strong>
          <h6 class="mb-0"><?php echo $alumno['matricula'] ?></h6>
        </div>
        <div class="col-auto d-none d-lg-block">
            <img src="https://colebioqsf2.org/colebioq_control/files/novedades/3_MATRICULA.png" width="110" height="110">
        </div>
      </div>
    </div>
  </div>
  <!-- SEGUNDA SECCION-->
    <div class="row mb-2">
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Nivel Academico</strong>
          <h6 class="mb-0"><?php echo $nivel['descripcion'] ?></h6>
        </div>
        <div class="col-auto d-none d-lg-block">
        <img src="https://karlanarvaez.webcindario.com/grado.png" width="110" height="110">

        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Especialidad</strong>
          <h6 class="mb-0"><?php echo $alumno['especialidad'] ?></h6>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="data:image/png;base64,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" width="110" height="110">

        </div>
      </div>
    </div>
  </div>
  <!-- TERCERA SECCION-->
  <div class="row mb-2">
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden  mb-4 shadow-sm position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Cuatrimestre</strong>
          <h6 class="mb-0"><?php echo $cuatri['nombreCuatrimestre'] ?></h6>
        </div>
        <div class="col-auto d-none d-lg-block">
          <!--<svg class="bd-placeholder-img" width="110" height="110" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: HOLA" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Hola</text></svg>-->
            <img src="https://www.pngkey.com/png/detail/333-3330465_imagen-de-el-correo.png" width="110" height="110">
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Área</strong>
          <h6 class="mb-0"><?php echo $area['nombreArea'] ?></h6>
        </div>
        <div class="col-auto d-none d-lg-block">
            <img src="https://colebioqsf2.org/colebioq_control/files/novedades/3_MATRICULA.png" width="110" height="110">
        </div>
      </div>
    </div>
  </div>
  <!-- SEGUNDA SECCION-->
    <div class="row mb-2">
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Grupo</strong>
          <h6 class="mb-0"><?php echo $alumno['grupo'] ?></h6>
        </div>
        <div class="col-auto d-none d-lg-block">
        <img src="https://karlanarvaez.webcindario.com/grado.png" width="110" height="110">

        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Promedio</strong>
          <h6 class="mb-0"><?php echo $alumno['promedio'] ?></h6>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAMAAACahl6sAAAAM1BMVEX////zzjv22mz67bX00Uf11FT+/PP44IX55p3888799tr112D9+eb66an78ML45JH33Xgndxe+AAAKYElEQVR4nO1d67arrA7t9gLirX3/p/3qkiCoQAgBO8Y581f3Xi0ycyMEkNfr//hfwazUMnwhmy/k9mlRan66VykY12/nu38edF9S6/h0H2MYW9n4GLhoZPurbMbl41WDRzmf5dfIiFX2aSQAvVzF070HiPZDIwH4tL/AZZV5LHbI9VkW8+CzqL75DMOqlNLCFt+P6xaLvT8YngvN6tak+k8kvH7D8+eWzkfV6rmD9qYzzYB1XbEON4G6b8v2+QZXGv072c7X97WVulQuNKaFaOHzMj1H5UyDzGLHhUslKsq17U4yjM6jdJOCprzbC3fY6LnGMnFSsyw8Ri5dOcG5qu4WzrZPGJ1HSXb9K0fdTbGMcij/GFdUQ4lHvGY7tpTzRsfApgJpS2t5R180xVstt++4I7ETrIbCEUXYNswbvkbLrJoKWeps2dfE6IzrYVZFo6IFK853bIa81FXHDlspTMKT7C3iYMlPMjQnDsn0lWse4xG+mmyXF4ebf6qXCMQxBZ0yH26Fq6pmBTjMKy94jSZ2dM/Mp1/q6EEGk4NHbfew+tDnMzl45FmoyPv1lMtkNjwyY8aQl8UeLk9jckgiM4qLrssMOTLHMth4bNOY3IlFDpOGi8fra6FdbhuGSUP+ZTaPdmsle1pB7c/CxuP1Fz777GYMk6SBeSVr8oJ2byh/pmdsPSGrNwNIbobz0grhUImJPvggbH7S5/NoQY75KhF9qnhlMnU/TIKRr5LDUJCOa4TIMMU0bXGo5HBdVFsmM+Eoj1mVHQaVmBJhh5lxQ3T4MDzYUgiLSl6QdiGiKYwgDI7uKIRHJcbho+Yyw2M5JiCOQnhUMkJjMeNqsIwxOK1scajEuEnEuMCwJo5nnhTCo5IXDHLBVEV0CVEhiuuSLUerEFWDkxyJYYvFRSFMKgGrCQyL4EkshnVVCJNKjHH541ET/UYCbhTCpBKQt9ffIQN4czztTiFcKnnr1nw5VI/wIjRuFcKkEohJHrHAo3lqo57tTDwqAX+/FwvbFGiDRyFMKgn2tS3xpFIqWQOd1Y/On6Vv8CqES1CNVyzAkafqHthzyqMSpVu7Bq6mkkKYVXLp78j6lOAmYN5och68ZYmHFFWJFtYp4xL1FMItLXf41iNM0UGdWSUwvLvjt04oC2ZZ/CrRGZeTqoOrs8ynogphUgmUF2x31+R4Yi/i3AKPSpqrGfWMgkIohPdJllTAslhcHXWQhEUl4O6HbWnL4ti6glMIk0r04HfYlhYiy74o5MkeFpWsp7a0ZWWvWG5AKoRJJSfb0qMhQ9VarUiFbBs8GfJsXdOGMbHJl5EKnj304e9MYg4frX8YNnSzpJhFY8DFB1JE3Zf9H4lVOQ4G+Xx0arX/Ste3sXkWP4MMPnrg2NcOtItEg2/4DG4RPtGSpw7Au5PovvldZFTD23vsrjD65j0oPx/tJH8jhx5FfC6CD6gl4d2Nr51kPLTjzU9YTn7mIta7bejQvu4vlL797deCPxDpwXzzdu3rgTiBTjtKITBU67Fj83btA/7vPs4kmHLsX+mdTz/KJJw6GT1YuvlNJpEU0HiGJhJbV3+MSSyVHYDIgCPyFJNoSm7ClmEUg6qWnRxA7Mg3FvXBErF2mFfjgVhe1kQ+4CzxX9RngtvBt3+3SSFSmQlyJyIQ+ZdApCoT7I5KIACEfo0JemcomFQaEedoZUngTyIRidinx0rywFdCqESqMEnZAU4mUoFJ0k52OpHiTNJ25GcQKcwk8WRBDpGiTFJPSGQRKViSSF6kySRSikn6YlMukTJMCItm2URKMKEs/rlESCth7ExIi5hQfUBUg2oxoS3G7r/tk+YjFwz+XqWDeK5g/7GZWBH3LDOWJIgrfzMQ0ZVd6koeGxPqCqaes7/BOsgroUxMcp8/HB8eZUJfUTaK0KrJ2L7BQYT+dB05FSxe0Xc4jf7u4UE/H6GD1fxKK6PcYPX2LgH0bTBH9w9KNLCMJWQXNdHXGBlZJpnvyN1B3gdjrYBaq3AksMyxyIehrBVQ3EqPHxw86C5qr4DuH6m7tZS/cymgZhadJQdrzZ2AZ0d2Z7eD9nbiiSSmBJjootrB9+Fcy5QYOJDviY+B6KI6ZO761KGY6CRMW1WImzW1i8xOX7L2sGWDtn/PlYKekpB2+DMFLaIYTz0/b59NweLvWhpIsea8YVm3RUm32LYOUewBziuY/zhtn00BU9Ciha3LhuXrtn802NYUKUHzcsgCQk/64D57O5aMdMO+OWShbSvdTtmCFiVsaf+0R3JtW+nqZazQpScp2qztNE3c/B8KjEXT5PIHSN8ZSnWHkkMHW9CiP9sVAPhNqrvz8UieW3m6PN3RQzcWRDcMqCCdKERtROdJMsyP0oIgohTUba8CFxgqaeUPCPxntwZ3T1NJPGjBS8ZFPCykhS3d3vVQ7uD7QwixUpC0FDzHqCTN7EDwV/YwuifJJVwKkic7jVBJKgmBLdzIHZ6S4iWhft290HwOhuuEB4OH3HlC6G8eBIKW7/IFFaCSELaCUk9XibcUFLpDwk8Fn1eEhQ5/xQ+xnqAVuwrDRwXvntCAR+axdwt523OAuSro7g6sBAlCzu3L1s27hbAh+O4NWkj7uKOCndiJ6NuawFSwOibT2HBDBflLRDehbVz8OM+qusQpxSVvwc2tIFaGFAhdw41NbimoS79f5ZyC4aofMAoHaUPOgZLtO4/GBpcKaqoNhhXOaMwbWTHGZQUt+m039j02mLAFhhV7A6N54ySiZ0aY56QqDUcKhqgZCNT7JjeAmOOZimChscFQiUsPvhlXnjGuaCRVTDT+nirj/rsBkiLMqz3BuKLHBTbj5ruY6y9vicUYc1gCFd8gcsXcRPJfWhexZ+MguDkYZCoxOxz4L62LaAT8FzuNNSM2yxtf+GCiG1qCZsiuf6lqAGb2k7D8IX+QSUuxk2MT/89c122m1WmHAMxowvE2fw6YwJv6cujxt5hkdMdUQ3+ByXFqkOC07e8wyeJhM3n48vQ1j4c9cXo0Ch/VM/LbF49abZmLYVE4Jl4ZiYbkaCQPTF2wrvGrfhviBsF2jeFhoE8EL+uwdrabWoXq6lc7WvUmhnBjSaXuZZvWRZs81mDdQVrznkrrrR9c10paF7n+e1dSirCqf/lXuBpYrfZVlKKsCjfPS4g17LvAy3uK5R3s94Hb73ooff+0de806xXaGnbJuqR92VbFa1a3T+AtaVkPaSrISzhbSktQcZdJC0ZIRynsVFwaZcOjcFekJ8aQ0rr7QegrLkjM7kaabuCpxp8W4T41LrRXp600TZspPNGedhlNtTKh88pyJzNm9as8Le6mrHFn47JI3n1agjV8dXFeoq5KY8PNev/0XhOMTKzv63av6jQ2rHdbUSa5IAxcLfJuz1rzVN1pPps3yLUZFnXLR6ll8Lw6uONZjSRCtKHdgH3zxXv44r19Ch3HmnJDXz7mJfu8WL88qQwL85JxYHdaHq8t25hbj78E0UlK0C6OcZEJVtbL31LFCUINMnqEoZGDety3UZhVuwWqk+dMWwhrVRlj+g8ymFb5mibh4gAAAABJRU5ErkJggg==" width="110" height="110">

        </div>
      </div>
    </div>
  </div>
    </main>

  </div>
  
    <?php
                    }
                }
            }
        }
    }

    mysqli_close($Conexion);
    ?>
    <!-- /.row -->

  </div>
  <!-- /.container -->
  <div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-outline-primary h-100">
        <h3 class="card-header bg-success text-white">Proyecto</h3>
        <div class="card-body">
      <table class="table">
      <thead class="thead-light">
          <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th>Modificar</th>
          </tr>
          <tr>
            <td>University Projects</td>
            <td>Es una herramienta Web que ayudará a aumentar el desarrollo de proyectos multidisciplinarios</td>
            <td>Desarrollo</td>
            <td><a href="#" class="btn btn-lg btn-success btn-block">Editar</a></td>
          </tr>
        </table>
        </div>
      </div>
    </div>
  </div> 
  </div>
  </div>
  
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; University Projects 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
