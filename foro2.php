<?php

//RETOMAMOS LA SESION QUE ESTA INICIADA

  session_start();

  //SI NO HAY INICIADA UNA SESION REDIRIGIRA AL INDEX

  if(!isset($_SESSION["usuario"])){

    header('Location: index.php');

  }
  $back = 0;
  $id=$_SESSION['id'];

  include_once('Conexion.php');
  include_once('inactividad.php');
  include_once('permisoEdit.php');
  include_once('refresh.php');
?>

<!DOCTYPE html>

<html lang="en">



<head>



  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="">

  <meta name="author" content="">



  <title>Foro</title>

<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
  <!-- Bootstrap core CSS -->

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/*ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
 function tiempoReal() {
    var tabla = $.ajax({
      url: 'usersConec.php',
      dataType: 'text',
      async: false,
    }).responseText;

    document.getElementById("users").innerHTML = tabla;
  } 
  setInterval(tiempoReal, 1000);
</script>

  <!-- Custom styles for this template -->

  <link href="css/modern-business.css" rel="stylesheet">





</head>

<style>

  h2{

color:black;

  }

  label{

color:black;

  }

  span{

	  color: #FFFFFF;

	  font-weight:bold;

  }

  .top{

    margin-top: 3%;

    width: 90%;

    padding-right:10%;

    padding-left:10%;

  }

  .btn-primary1 {

    background-color: #005F40;

    color: white;

    border-radius: 50px;

    padding-left: 2%;

    padding-right: 2%;

    padding-block-end: 1%;

    padding-top: 1%;

	}



  .contenedor{

    padding-left: 10%;

    padding-right: 10%;

    padding-block-end: 25px;

    overflow-y: scroll;

    height: 500px;

  }



	.message{

		background-color: #005F40;

		color: white;

		border-radius: 35px;

		padding: 5px;

    padding-right: 40px;

		margin-bottom: 2%;

    max-width: 100%;

    word-wrap: break-word;

    text-align: right;

    justify-items: end;

    align-items: end;

	}



  .messageO{

		background-color: transparent;

		color: black;
    border-color: #dedfde;

		border-radius: 35px;

		padding: 5px;

		margin-bottom: 3%;

    max-width: 100%;

    word-wrap: break-word;

    border-color: black;

    border-width: 1px;

    border-top-style: solid;

    border-right-style: solid;

    border-bottom-style: solid;

    border-left-style: solid; 

    padding-left: 40px;

	}



  .text-black{

    color: black;

  }



  .box{

    width: 80%;

    word-wrap: break-word;

    border: 1px solid;

    border-radius: 30px;

    outline-style: none;

    padding-left: 10px;

    padding-top: 10px;

  }

  .box2{

      width: 50%;

    word-wrap: break-word;

    padding-left: 10px;

  }



  .padding{padding-left: 40px;padding-block-end: 30px;}



.listado{

  background-color: #DADADA;

  border-radius: 20px;

  height: 100%;

  overflow-y: scroll;

  scroll-behavior: auto;

}



  .online{

    background-color: green;

    width: 10px;

    height: 10px;

    float: right;

    border-radius: 50%;

    align-items: center;

  }



  .file{

    size: 5in;

    outline-style: none;

  }


  /*@media screen and (max-width: 900px){
    #users{
		display: none;
  }
}*/
  </style>
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
<body>



  <!-- Navigation -->

  <?php
    include_once('header.php');
  ?>

  <!-- Page Content -->

  <div class="row">

    <div class="col-md-9">

<div class="top container">

    <!--FORMULARIO-->

  <form onsubmit="return sendMessage();" >

  <input type="hidden" name="myName" id="myName" value="<?php echo $_SESSION['name']; ?>">

  <input type="hidden" name="myId" id="myId" value="<?php echo $_SESSION['id']; ?>">

  <!--<input type="text" class="box" autocomplete="off" id="messaage" name="mensaje" placeholder="Comparte algo con todos" aria-label="Recipient's username" aria-describedby="button-addon2">-->

  <textarea class="box" autocomplete="off" name="mensaje" id="messaage" cols="47" rows="3" placeholder="Escribe tu mensaje" required></textarea>

  <!--Archivos-->

  

  &nbsp;<!--<input type="submit" class="btn btn-primary1">-->

  <button class="btn btn-primary1" type="submit">Enviar</button>

  </form>

  </div>

    </div><br/>





    <div class="col-md-3">
      
    <section id="users" class="p-4 mb-3 listado">
      <!-- LISTA DE USUARIOS ONLINE-->

    </section>

    </div>

</div></div>

  <!-- /.container -->

  <div class=""> kbxcnjb</div>

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



  var myName = document.getElementById("myName").value;

  var myId = document.getElementById("myId").value;



  function sendMessage(){

      //get message

      var message = document.getElementById("messaage").value;

      document.getElementById("messaage").value="";

      //save in database

      firebase.database().ref("menssages").push().set({

          "sender": myName,

          "message": message,

          "idUser": myId,

      });



      //prevent form from submiting

      return false;

  }



  //listen for incoming messages

  firebase.database().ref("menssages").on("child_added", function (snapshot) {

      var html = "";

      //give each message a unique ID

      if(snapshot.val().sender == myName && snapshot.val().idUser == myId) {

          

        html += "<div class='message'>";

        html += "<div id='mandado-" + snapshot.key + "'><b>"+snapshot.val().sender +"</b>"+"&nbsp;&nbsp;";

        html += "<span class='btn btn-danger' data-id='"+ snapshot.key + "' onclick='deleteMessage(this);'>";

        html += '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">';

  html +='<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg>';

        html += "</span>";

        html += "</div>"

        html += "<p id='message-" + snapshot.key + "'>";

        html += snapshot.val().message;

        html += "                                              ";

        html += "</p>";

        html += "</div>";

      }else{

        html += "<div class='messageO'>";

        html += "<div id='mandado-" + snapshot.key + "'><b>"+snapshot.val().sender +"</b>";

        html += "</div>"

        html += "<p id='message-" + snapshot.key + "'>";

        html += snapshot.val().message;

        html += "                                              ";

        html += "</p>";

        html += "</div>";

        //html +='<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="60%" data-numposts="5"></div>'

      }

        

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

        document.getElementById("mandado-"+ snapshot.key).innerHTML="<i>Este mensaje fue eliminado</i>";

        document.getElementById("message-"+ snapshot.key).innerHTML="";

        //document.getElementById("message-"+ snapshot.key).innerHTML="This message has been removed";

      });

</script>



<!-- create a form to send message -->

<div class="col-md-9">

      <div class="contenedor">

          <p id="messages"></p>

          

</div>

  </div>

  <!-- Footer -->

  <?php
    //include_once('footer.php');
  ?> 



  <!-- Bootstrap core JavaScript -->

  <script src="vendor/jquery/jquery.min.js"></script>

  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="app.js"></script>


</body>



</html>

