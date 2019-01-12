<?php
session_start();
include 'db.php';

if(isset($_POST['send']))
{
$query="INSERT INTO `posts` (`msgs`,`name`) VALUES ('".mysqli_real_escape_string($link,$_POST['msg'])."','".mysqli_real_escape_string($link,$_SESSION['name'])."')";
$result=mysqli_query($link,$query);
if($result){
  header('location:home.php');
}
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>let's talk</title>
  <script>
  function ajax() {
    var req = new XMLHttpRequest();
    req.onreadystatechange = function(){
      if(req.readyState == 4 && req.status == 200) {
        document.getElementById('chat').innerHTML = req.responseText;
      }
    }
    req.open('POST','chat.php',true);
    req.send();
  }
     setInterval(function(){ajax()},1000);
  // $.ajax({
  //          type:"POST",
  //          url :"chat.php",
  //          data: {
  //            msg_s:"yes",
  //            msg:$('#msg').val();
  //
  //          },
  //          success : function(msg)
  //          {
  //            if(msg=="yes")alert
  //
  //
  //            // $("#login").hide();
  //            // $("#chat").show();
  //            // $("#chat").scrollTop(1000);
  //            // $(".ex1").scrollTop($(".ex1")[0].scrollHeight);
  //
  //          }
  //      });


  </script>
</head>
<link rel="stylesheet" href="home.css ">
<body onload="ajax();">
  <div id="main">
    <h1 style="background-color: #6495ed;color:white;"><?php echo $_SESSION['name'] ?>-online </h1>
    <div class="output">
      <div id="chat"></div>

    </div>
    <form method="post" action="">
      <textarea id="msg" name="msg" placeholder="type messge"
      class="form-control"></textarea><br>
      <button type= "submit" name="send">send</button>
    </form>
    <br>
    <form action="logout.php">
      <input style="width: 100%;background-color: #6495ed;color:white;font-size:20px;" type="submit" value="logout">
    </form>
  </div>
</body>
</html>
