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
      html += "<li id='message-" + snapshot.key + "'>";
      if(snapshot.val().sender == myName) {
          html += "<button data-id='"+ snapshot.key + "' onclick='deleteMessage(this);'>";
          html += "Delete";
          html += "</button>";
      }
        html += snapshot.val().sender + ": " + snapshot.val().message;
      html += "</li>";

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
<form onsubmit="return sendMessage();">
  <input id="messaage" placeholder="Enter message" autocomplete="off">
  <input type="submit">
</form>

<ul id="messages"></ul>