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

    $sql = "SELECT foro.titulo,foro.asunto,foro.archivo,foro.fecha,foro.idUsuario,foro.id,usuario.id,usuario.nombre,usuario.apellidoPaterno,usuario.apellidoMaterno,usuario.foto
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
    .file{
      max-width: 80%;
      margin-block-end: 2%;
      margin-top: 1%;
    }
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
    @media screen and (max-width: 800px){
      .autor{
        margin-top: 8%;
        margin-block-end: 4%;
        padding-top: 1%;
        padding-block-end: 1%;
        max-width: 90%;
      }
    }
</style>
<body>
    <!-- Navigation -->
  <?php
    include_once('header.php');
  
        
    ?>
    <div class="container" style="margin-top: 3%;margin-block-end: 2%;">
      <center>
      <?php echo "<a href='tipoPErfil.php?id=".$public['idUsuario']."' style='color: black; text-decoration: none;'>"; ?>
      <div class="autor" id="marco" style="margin-block-end: 2%;">
        <center>
          <img src="<?php echo $public['foto'] ?>" width="40px" alt="<?php echo $public['nombre'] ?>" style="border-radius: 50%;">
          <strong style="font-size: 20px;"><?php echo $public['nombre']." ".$public['apellidoPaterno']." ".$public['apellidoMaterno']; ?></strong>
        </center>
      </div>
      <?php echo "</a>"; ?>
      </center>
        <h2 class="text-center" style="font-family: Helvetica; font-weight:bold;"><?php echo $public['titulo']; ?></h2>
        <center><img class="file" src="<?php echo $public['archivo']; ?>" alt="<?php echo $public['nombre']; ?>" style="height: 20rem;"></center>
        <h6 class="" style="font-family: Helvetica; text-aling: justify;"><?php echo $public['asunto']; ?></h6>

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
    include_once('footer.php');
  ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
<script id="dsq-count-scr" src="//university-proyects.disqus.com/count.js" async></script>
</html>
