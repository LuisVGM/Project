<?php
    include_once('Conexion.php');
    //RETOMAMOS LA SESION QUE ESTA INICIADA
    session_start();
    //SI NO HAY INICIADA UNA SESION REDIRIGIRA AL INDEX
    if(!isset($_SESSION["usuario"])){
        header('Location: index.html');
    }
    $back = 0;
    $myId=$_SESSION['id'];
    include_once('inactividad.php');
    include_once('permisoEdit.php');
    include_once('refresh.php');
    $post = $_GET['id'];
    $usuario = $_GET['user'];

    $sql = "SELECT foro.fecha,foro.titulo,foro.asunto,foro.archivo,foro.fecha,foro.idUsuario,foro.id,usuario.id,usuario.nombre,usuario.apellidoPaterno,usuario.apellidoMaterno,usuario.foto
        FROM foro INNER JOIN usuario WHERE foro.id = $post AND foro.idUsuario = usuario.id";
        $result= mysqli_query($Conexion,$sql);
        $totalFilas = mysqli_num_rows($result);
        while ($public= mysqli_fetch_array($result)) {
?>
<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Alumnos-UTSV">
  <meta name="author" content="Luis Valentin">

  <title><?php echo $public['titulo']; ?></title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

</head>
<script type="text/javascript">
 function tiempoReal() {
    var tabla = $.ajax({
      url: 'recibidas.php',
      dataType: 'text',
      async: false,
    }).responseText;

    document.getElementById("notif").innerHTML = tabla;
  } 
  setInterval(tiempoReal, 1000);
</script>
<style>
    body{
    font-family: 'Roboto', sans-serif;
  }
  h1, h2, h3, h4, h5, h6 {
    font-family: 'Roboto', sans-serif;
  }
  strong{font-family: 'Roboto', sans-serif;}   
    .autor{
      border-color: #dedfde;
      max-width: 35%;
      border-style: solid;
      border-width: 2px;
      border-radius: 50px;
      padding-top: 1%;
      padding-block-end: 1%;
      background-color: transparent;
    }

    .contenedor{
      margin-left: 2%;
      margin-right: 2%;
      margin-top: 2%;
    }
    .autorP{
      /*margin-top: 7%;*/
      /*border-radius: 10px;*/
      position: relative;
      width: 25%;
      border-right: 1px solid;
      /*box-shadow: 0px 0px 4px 1px #909090;*/
      /*height: 315px;*/
      /*background-color: black;*/
    }
    .datos{
      border-radius: 10px;
      display: block;
      /*background-color: green;*/
      padding-top: 10%;
      margin-bottom: 10%;
      
    }
    .post{
      /*background-color: gray;*/
      width: 75%;
      padding-right: 2%;
      padding-left: 2%;
    }
    .file{max-width: 100%;}
    .foto{width: 100px; height: 100px;}
    #report{display: none;}
    .reporte{
      position: absolute;
      bottom: 0;
      margin-left: 10%;
      margin-right: 10%;
    }
    .documentos{
      width: 100%;
      border-radius: 10px;
      border: 1px solid #dedfde;
      margin-bottom: 5%;
    }
    .doc{
      height: 8vh;
      border-top-left-radius: 10px;
      border-end-start-radius: 10px;
      margin-right: 1%;
    }
    .limite{
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background-size: 100%;
    background-position: 100% 50%;
    /*margin-block-end: 5px;*/
    }
    @media screen and (max-width: 1090px){
      .autor{
        margin-top: 8%;
        margin-block-end: 4%;
        padding-top: 1%;
        padding-block-end: 1%;
        max-width: 60%;
      }
    }
    @media screen and (max-width: 1050px){
      .autor{
        margin-top: 8%;
        margin-block-end: 4%;
        padding-top: 1%;
        padding-block-end: 1%;
        max-width: 80%;
      }
    }
    @media screen and (max-width: 1000px){
      .autor{
        margin-top: 8%;
        margin-block-end: 4%;
        padding-top: 1%;
        padding-block-end: 1%;
        max-width: 70%;
      }
      
    }
    @media screen and (max-width: 700px){
      .autor{
        margin-top: 8%;
        margin-block-end: 4%;
        padding-top: 1%;
        padding-block-end: 1%;
        max-width: 90%;
      }
      .contenedor{margin-top: 8%;}
      .foto{width: 40px; float: left;margin-left: 1%;}
      .autorP{width: 100%; height: auto; margin-bottom: 2%;} .datos{padding-top: 1%;} .name{font-size: 18px;float: left;margin-top: 10px;margin-left: 10px;}
      #fechaP{display: none;}
      .post{width: 100%;} .file{/*max-width: 100%;*/ max-height: 10rem;} .titleP{font-size: 22px;}
      .report{ display: none;} #report{display: block; margin-top: -7%;}
      .limite{
        width: 40px;
        height: 40px;
      }
    }
</style>
<body>
    <!-- Navigation -->
  <?php
    include_once('header.php');
  
        
    ?>
    
      <!--<center>
      <?php echo "<a href='tipoPErfil.php?id=".$public['idUsuario']."' style='color: black; text-decoration: none;'>"; ?>
      <div class="autor" id="marco" style="margin-block-end: 2%;">
        <center>
          <img src="<?php echo $public['foto'] ?>" width="40px" alt="<?php echo $public['foto'] ?>" style="border-radius: 50%;">
          <strong style="font-size: 20px;"><?php echo $public['nombre']." ".$public['apellidoPaterno']." ".$public['apellidoMaterno']; ?></strong>
        </center>
      </div>
      <?php echo "</a>"; ?>
      </center>
        <h2 class="text-center" style="font-family: Helvetica; font-weight:bold;"><?php echo $public['titulo']; ?></h2>
        <center><img class="file" src="<?php echo $public['archivo']; ?>" alt="<?php echo $public['nombre']; ?>" style="height: 20rem;"></center>
        <h6 class="" style="font-family: Helvetica; text-aling: justify;"><?php echo $public['asunto']; ?></h6>
  -->   <div class="container">
        <div class="contenedor row">
          <!-- AUTOR DE PUBLICACIÓN -->
          <div class="autorP text-center">
            <?php 
            //IMAGEN DEL AUTOR
            echo '<center><div class="limite" style="background-image: url('.$public['foto'] .');margin-top: 5%;"></div></center>'; ?>
           <div class="datos text-center row" id="autorPost">
            <?php echo "<a href='tipoPErfil.php?id=".$public['idUsuario']."' style='color: black; text-decoration: none;' title='".$public['nombre']."'>"; 
             //echo '<img src="'. $public['foto'] .'" class="foto" alt="<'.$public['nombre'].'" style="border-radius: 50%; margin-block-end: 5px;">';
              ?>
             <h6 class="name"><?php echo $public['nombre']." ".$public['apellidoPaterno']." ".$public['apellidoMaterno']; ?></h6>
             <?php echo "</a>"; ?>
             <small title="Fecha de publicación" id="fechaP"><?php echo $public['fecha'] ?></small>
            </div><!-- REPORTAR -->
            <!--<div class="documentos row">
              <img class="doc" src="imag/code.png" alt="">
              <small>Code Index UNIP.pdf</small>
            </div>-->
            <div class="reporte">
              <a href="#" id="report"><img src="imag/report_black_24dp.svg" width="20px" alt="report"></a>
              <a href="#" class="btn btn-secondary report"><img src="imag/report_white_24dp.svg" width="20px" alt="report"> Reportar publicación</a>
            </div>
          </div>
          <!-- POST / CONTENIDO DE PUBLICACIÓN -->
          <div class="post">
          <h2 style="font-weight:bold; text-aling: justify;" class="titleP"><?php echo $public['titulo']; ?></h2>
          <h6 class="" style="text-aling: justify;"><?php echo $public['asunto']; ?></h6>
            <img class="file" src="<?php echo $public['archivo']; ?>" alt="<?php echo $public['nombre']; ?>">
          </div>
        </div>
        </div>

        <div class="container" style="margin-top: 3%;margin-block-end: 2%;">
        <div id="disqus_thread" style="margin-top: 1%;"></div>
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://university-proyects.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    </div>

    <?php
    
    }
    //include_once('footer.php');
  ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
<script id="dsq-count-scr" src="//university-proyects.disqus.com/count.js" async></script>
</html>
