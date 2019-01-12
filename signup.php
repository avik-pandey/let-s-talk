<?php
include 'db.php';
$error = "";
if (!$_POST['uname']){
  $error.="username not filled<br> ";
}
else if(!$_POST['email']){
  $error.="email not filled<br>";
}
else if(!$_POST['password']){
  $error.="password not filled<br>";
}
else if(!$_POST['rpassword']){
  $error.="repeat ur password<br>";
}
else {
$query = "INSERT INTO `users` (`uname`,`email`,`password`,`rpassword`) VALUES ('".mysqli_real_escape_string($link,$_POST['uname'])."','".mysqli_real_escape_string($link,$_POST['email'])."','".mysqli_real_escape_string($link,$_POST['password'])."','".mysqli_real_escape_string($link,$_POST['rpassword'])."')";
$result = mysqli_query($link,$query);
if($result){
  header ("location:home.php");
}
}
if($error!=""){
 $error='<div class="alert alert-danger" role="alert"><p><strong>Oops</strong></p><br>'.$error.'</div>';
}

?>
