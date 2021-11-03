<?php
    include '../Conexion.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Registrate</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/checkout/">

    <!-- Bootstrap core CSS -->
<link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      div#fondo {
        background-color:  #005F40 !important;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
      }

      .fwhite {
        color: #ffffff;
      }

      .form-signin .checkbox {
      font-weight: 400;
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="../form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <div class="container">
  <div class="py-5 text-center" id="fondo">
    <img class="d-block mx-auto mb-4" src="../imag/logo.jpeg" alt="" width="72" height="72">
    <h2 class="fwhite">University Projects</h2>
    <p class="lead fwhite">Comparte tus ideas para Proyectos con la comunidad estudiantil UTSV.</p>
  </div></br>

      <h4 class="d-flex text-center mb-3">
        <span class="text-muted">Registrate</span>
      </h4>
      <h4 class="mb-3">Datos Personales</h4>
      <form class="needs-validation" novalidate method="POST" action="../registro.php">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="primernombre">Nombre (s)</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="" required>
            <div class="invalid-feedback">
              El Nombre es requerido.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="apellidopaterno">Apellido Paterno</label>
            <input type="text" class="form-control" id="apellidopaterno" name="apellidopaterno" placeholder="" value="" required>
            <div class="invalid-feedback">
              El apellido Paterno es requerido.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="apellidomaterno">Apellido Materno</label>
            <input type="text" class="form-control" id="apellidomaterno" name="apellidomaterno" placeholder="" value="" required>
            <div class="invalid-feedback">
              El apellido Materno es requerido.
            </div>
          </div>
        </div>

        
        <!--Datos Escolars-->
      <h4 class="mb-3">Datos Escolares</h4>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="exampleFormControlSelect1">Nivel Académico</label>
          <!--<label for="area">Área</label>
          <input type="text" class="form-control" id="area" placeholder="" name="area" value="" required>-->
          <select name="nivel" id="nivel" class="form-control" required>
            <option value="">...</option>
            <option value="1">TÉCNICO SUPERIOR UNIVERSITARIO</option>
            <option value="2">INGENIERÍA</option>
          </select>
          <div class="invalid-feedback">
            Por favor especifíca tu Nivel Académico.
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <label for="exampleFormControlSelect1">Área</label>
          <!--<label for="area">Área</label>
          <input type="text" class="form-control" id="area" placeholder="" name="area" value="" required>-->
          <select name="area" id="area" class="form-control" required>
            <option value="">...</option>
            <?php
                $select1="SELECT * FROM area";
                $ejecutar= mysqli_query($Conexion,$select1);
                while ($area= mysqli_fetch_array($ejecutar)) {
            ?>
                <option value=<?php echo $area['id'] ?> > <?php echo $area['nombreArea'] ?></option>
            <?php } ?>
          </select>
          <div class="invalid-feedback">
            Por favor especifíca el área o carrera en la que estudias.
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <label for="exampleFormControlSelect1">Cuatrimestre</label>
          <select name="cuatrimestre" id="cuatrimestre" class="form-control" required>
            <option value="">...</option>
            <?php
                $select2="SELECT * FROM cuatrimestre";
                $ejecutar= mysqli_query($Conexion,$select2);
                while ($cuatrimestre= mysqli_fetch_array($ejecutar)) {
            ?>
            <option value=<?php echo $cuatrimestre['numero'] ?> > <?php echo $cuatrimestre['nombre'] ?></option>
            <?php } ?>
          </select>
          <div class="invalid-feedback">
            Por favor especifíca el cuatrimestre que cursas.
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <label for="exampleFormControlSelect1">Grupo</label>
          <select name="grupo" id="grupo" class="form-control" required>
            <option value="">...</option>
            <?php
                $select3="SELECT * FROM grupo";
                $ejecutar= mysqli_query($Conexion,$select3);
                while ($grupo= mysqli_fetch_array($ejecutar)) {
            ?>
                <option value=<?php echo $grupo['id'] ?> > <?php echo $grupo['grupo'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-md-6 mb-3">
          <label for="matricula">Matricula</label>
          <input type="text" class="form-control" id="matricula" name="matricula" placeholder="" value="" required>
          <div class="invalid-feedback">
            La matricula es requerida.
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <label for="exampleFormControlSelect1">Promedio Anterior</label>
          <select name="promedio" id="promedio" class="form-control" required>
            <option value="">...</option>
            <?php
                $select4="SELECT * FROM promedio";
                $ejecutar= mysqli_query($Conexion,$select4);
                while ($promedio= mysqli_fetch_array($ejecutar)) {
            ?>
                <option value=<?php echo $promedio['id'] ?> > <?php echo $promedio['promedio'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-md-6 mb-3">
          <label for="exampleFormControlSelect1">Especialidad</label>
           <select name="especialidad" id="especialidad" class="form-control" required>
            <?php
                $select5="SELECT * FROM especialidad";
                $ejecutar= mysqli_query($Conexion,$select5);
                while ($especialidad= mysqli_fetch_array($ejecutar)) {
            ?>
                <option value=<?php echo $especialidad['id'] ?> > <?php echo $especialidad['especialidad'] ?></option>
            <?php } ?>
            <option value="otro" onclick="">OTRO..</option>
          </select>
          <br>
          <!-- CUADRO DE TEXTO-->
          <span id="otraEsp"></span>
          
        </div>
      </div>
<!--Correo-->
<h4 class="mb-3">Correo Electronico</h4>
<div class="row">
  <div class="col-md-6 mb-3">
    <label for="email">Correo Electronico</label>
    <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="you@gmail.com" required>
    <div class="invalid-feedback">
      Porfavor ingrese su correo electronico Institucional.
    </div>
  </div>
  <div class="col-md-6 mb-3">
    <label for="email">Contraseña</label>
    <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="" required>
    <div class="invalid-feedback">
      Porfavor ingrese su contraseña.
    </div>
  </div>
  </div>
        <hr class="mb-4">
        <button class="btn btn-lg btn-success btn-block" type="submit">Registrar</button>
      </form>
    </div>
    <br/>
    <center><p>Ya tienes una cuenta? <a class="text-black" href="../diseño/login.html">Iniciar Sesión</a></p></center>
  </div>
  

  
  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2020 University Projects</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="vendor/jquery.slim.min.js"><\/script>')</script>
      <!--<script src="vendor/bootstrap/js/bootstrap.bundle.js"></script>
        <script src="form-validation.js"></script>-->
        <script src="otraEsp.js"></script>
</body>
</html>
