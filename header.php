<style>
  .limite2{
    max-width: 100px;
    max-height: 150px;
  }
  .limiteSesion{
    background-size: 100%;
    background-position: 100% 50%;
  }
  .limiteS{
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background-size: 100%;
    background-position: 100% 50%;
  }
</style>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark fixed-top" style="background-color: #005F40!important">

    <div class="container" style="background-color: #005F40!important">
      <img src="imag/logo.jpeg" alt="" width="60" height="60">

      <a class="navbar-brand" href="foro.php">University Projects</a>

      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>

      </button>

      <div class="collapse navbar-collapse" id="navbarResponsive">

        <ul class="navbar-nav ml-auto">

          <!--<li class="nav-item">

            <a class="nav-link" href="http://www.utsv.com.mx/">UTSV</a>

          </li>-->


        <?php
        //USUARIOS
        if($_SESSION['Rol'] == 3){
            echo '<li class="nav-item">

            <a class="nav-link" href="usuarios.php">Usuarios</a>
  
          </li>';
        }
        //PROFESORES
        if($_SESSION['Rol'] == 1){
            echo '<li class="nav-item">

            <a class="nav-link" href="profesores.php">Profesores</a>
  
          </li>';

          echo '<li class="nav-item">

          <a class="nav-link" href="alumnos.php">Alumnos</a>
  
          </li>';

        }
        //ALUMNOS
        if($_SESSION['Rol'] == 2){
            echo '<li class="nav-item">

            <a class="nav-link" href="alumnos.php">Alumnos</a>
  
          </li>';
        }
         ?>

          <!--<li class="nav-item">

            <a class="nav-link" href="foro2.php">Foro</a>

          </li>-->

          <li class="nav-item">

            <a class="nav-link" href="foro.php">Foro</a>

          </li>
          <!-- PERFIL-->
          <li class="nav-item dropdown" style="width: 20vh;">

            <a class="" style="color: #80afa0; text-decoration: none;" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

            <?php 
                /*echo '<img class="limite" src="'.$_SESSION['foto'].'" alt="'.$_SESSION['name'].'" 
                style="border-radius: 50%; width: 30px; height:30px; margin-right: 5px;">';
                echo $_SESSION['name'];*/
          echo '<div class="row  dropdown-toggle" style="margin-left: 2%;margin-top:5%;"><div class="limiteS " style="background-image: url('.$_SESSION['foto'].')" title="'.$_SESSION['name'].'"></div>'.$_SESSION['name'].'</div>';
          /*echo '<div class="row"><div class="limiteS" style="background-image: url('.$_SESSION['foto'].')" title="'.$_SESSION['name'].'"></div>';
          echo$_SESSION['name'].'</div>';*/
              ?>

            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
              <?php
                if($_SESSION['editarP'] == 0){
              ?>
              <a class="dropdown-item" href="tipouser.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg>&nbsp;Ver Perfil</a> 
                <?php
                  }
 
              if($_SESSION['editarP'] == 1){
                echo '<a class="dropdown-item" type="button" data-toggle="modal" data-target="#editar" id="'.$_SESSION['id'].'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-person" viewBox="0 0 16 16">
                <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z"/>
              </svg>&nbsp;Editar Perfil</a>';
              }
              ?>
              <a class="dropdown-item" type="button" data-toggle="modal" data-target="#cerrar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
</svg>&nbsp;Cerrar Sesión</a>

            </div>

          </li>
              <!-- NOTIFICACIONES-->
              
          <li class="nav-item">
          <a class="nav-link" type="button" data-toggle="modal" data-target="#notificaciones" >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
              <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
            </svg><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
    !</span></a>
          </li>
          <!-- FIN NOTIFICACIONES-->
        </ul>

      </div>

    </div>

  </nav>

  <div class="modal fade" tabindex="-1" id="cerrar">

      <div class="modal-dialog modal-sm modal-dialog-centered">

        <div class="modal-content">

          <div class="modal-header">

            <center><h4>¿Estás seguro de cerrar sesión?</h4>
            <?php
            /*echo '<img class="img-responsive limite2" src="'.$_SESSION['foto'].'" alt="'.$_SESSION['name'].'" 
            style="border-radius: 50%;">';*/
            echo '<div class="photo perfil limiteSesion" style="background-image: url('.$_SESSION['foto'].')"></div>';
            ?>
          </center>

          </div>

          <div class="modal-footer">

          <a class='btn btn-lg btn-danger btn-block text-white' href="sesion.php">Cerrar Sesión</a>

          <a class='btn btn-lg btn-info btn-block text-white' data-dismiss="modal">Cancelar</a>

          </div>

        </div>

      </div> 

    </div>
                <!-- MODAL DE NOTIFICACIONES -->
    <div class="modal fade" tabindex="-1" id="notificaciones">

      <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">

          <div class="modal-header">

            <center><strong>Notificaciones</strong></center>

            <button class="close" data-dismiss="modal">&times;</button>

          </div>

          <div class="modal-body" id="notif">

          

          </div>

          <!--<div class="modal-footer">

          <a class='btn btn-lg btn-danger btn-block text-white' href="sesion.php">Cerrar Sesión</a>

          <a class='btn btn-lg btn-info btn-block text-white' data-dismiss="modal">Cancelar</a>

          </div>-->

        </div>

      </div> 

    </div>
        