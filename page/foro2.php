<?php
  include('../Conexion.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Foro</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/modern-business.css" rel="stylesheet">

  <!-- icons-->
  <link rel="stylesheet" href="https://i.icomoon.io/public/temp/0d02497b49/UntitledProject/style-svg.css">
<script defer src="https://i.icomoon.io/public/temp/0d02497b49/UntitledProject/svgxuse.js"></script>

</head>
<style>
  h2{
color:black;
  }
  label{
color:black;
  }
  span{
	  <color: id="FFFFFF"></color:>;
	  font-weight:bold;
  }
  .top{
    margin-top: 3%;
    width: 90%;
    padding-right:10%;
    padding-left:10%;
  }
  .btn-primary1 {
    background-color: #673AB7;
	}
	.message{
		background-color: #005F40;
		color: white;
		border-radius: 5px;
		padding: 5px;
		margin-bottom: 3%;
	}
  </style>
<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v10.0" nonce="obwt8kwH"></script>
<?php
    //RETOMAMOS LA SESION QUE ESTA INICIADA
    
    $sql="SELECT * FROM `chat`";

		$query = mysqli_query($Conexion,$sql);
?>

  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top" style="background-color: #005F40!important">
    <div class="container bg-dark" style="background-color: #005F40!important">
      <img src="../logo.jpeg" alt="" width="60" height="60">
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
<br/>
  <!-- Page Content -->
  <div class="row">
    
  <!--<div class="container mb-3">
  <center><h2>Bienvenido <span style="color:#005F40;"><?php echo $_SESSION['name']; ?> !</span></h2>
	<br><br>
	<a href="chatpage.php" class="btn btn-primary">Abre el chat</a>
  </div>
    </div>-->

    <div class="col-md-9">
    


<div class="top container">
  <center><h2>Bienvenid@!</span></h2>
	<label>Acá puedes hablar tranquil@</label>
  </center></br></div>
  <div class="col-md-9">
  <form onsubmit="return sendMessage();">
  <input type="text" class="form-control" autocomplete="off" id="messaage" name="msg" placeholder="Publica algo" aria-label="Recipient's username" aria-describedby="button-addon2">
  <input type="submit">
  </form>
  </div>
    </div>


    <div class="col-md-3">
    <div class="p-4 mb-3 bg-light rounded">
      <center><h5>Lista de Amigos</h5></center>
      <?php
        $select="SELECT * FROM usuario";
        $ejecutar= mysqli_query($Conexion,$select);
        while ($tabla= mysqli_fetch_array($ejecutar)) {  
      ?>
        <h6><?php echo $tabla['nombre'].' '.$tabla['apellidoPaterno'].' '.$tabla['apellidoMaterno'] ?></h6>
      <?php }  ?>
    </div>
    </div>
</div></div>
  <!-- /.container -->
  <div class="">
  <!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-app.js"></script>

<!-- include firebase database-->
<script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-database.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->

<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyD7ZyC_6kvmIATusKsMG1B-GtIEHIZBKkg",
    authDomain: "chat-375a1.firebaseapp.com",
    projectId: "chat-375a1",
    storageBucket: "chat-375a1.appspot.com",
    messagingSenderId: "376189962279",
    appId: "1:376189962279:web:931b4d7773090e49496602"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

  var myName = prompt("Ingresa tu nombre");

  function sendMessage(){
      //get message
      var message = document.getElementById("messaage").value;
      //save in database
      firebase.database().ref("menssages").push().set({
          "sender": myName,
          "message": message,
      });

      //prevent form from submiting
      return false;
  }

  //listen for incoming messages
  firebase.database().ref("menssages").on("child_added", function (snapshot) {
      var html = "";
      //give each message a unique ID
      html += "<div class='card card-body'>";
      html += "<p id='message-" + snapshot.key + "'>";
      html += snapshot.val().sender + ": " + snapshot.val().message;
      html += "     ";
      if(snapshot.val().sender == myName) {
          html += "<button class='btn btn-danger' data-id='"+ snapshot.key + "' onclick='deleteMessage(this);'>";
          html += "Delete";
          html += "</button>";
          
      }
        
      html += "</p>";
      html += "</div>";


      document.getElementById("messages").innerHTML += html;
  });

  function deleteMessage(self){
      //get message id
      var messageId = self.getAttribute("data-id");
      //delete 
      firebase.database().ref("menssages").child(messageId).remove();
    }
      //attach listener for delete message
      firebase.database().ref("menssages").on("child_removed", function (snapshot){
        //remove message node
        document.getElementById("message-"+ snapshot.key).innerHTML="This message has been removed";
      });
</script>

<!-- create a form to send message -->
<div class="col-md-9">
          <h6 id="messages"></h6>
          
</div>
</div>
  </div>
  <!-- Footer -->
  <footer class="py-5 bg-dark" style="background-color: #005F40!important">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
