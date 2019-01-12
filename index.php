<?php
session_start();
include 'db.php';
$error= "";
if(isset($_POST['login'])){


  if(!$_POST['uname']){
    $error.="write username";
  }
  else if(!$_POST['pass']){
    $error.="write password";
  }
  else{

  $query="SELECT * FROM users WHERE (uname = '".mysqli_real_escape_string($link,$_POST["uname"])."') AND (password ='".mysqli_real_escape_string($link,$_POST["pass"])."') ";
  if($result=mysqli_query($link,$query)){

      if(mysqli_num_rows($result)>0)
      {
         $row=mysqli_fetch_array($result);
         if($row['password']==$_POST['pass']){

           $_SESSION['name']=$_POST['uname'];
           header('location:home.php');
         }
         else{
           echo "password incorrect enter right password";
         }
       }
     }
   }
   if($error!=""){
     $error='<div class="alert alert-danger" role="alert"><p><strong>Oops</strong></p><br>'.$error.'</div>';
   }

}
if(isset($_POST['signup'])){

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
  else{


  $query = "INSERT INTO `users` (`uname`,`email`,`password`,`rpassword`) VALUES ('".mysqli_real_escape_string($link,$_POST['uname'])."','".mysqli_real_escape_string($link,$_POST['email'])."','".mysqli_real_escape_string($link,$_POST['password'])."','".mysqli_real_escape_string($link,$_POST['rpassword'])."')";
  $result = mysqli_query($link,$query);
  if($result){
     $_SESSION['name']=$_POST['uname'];
    header ("location:home.php");
  }
}

  if($error!=""){
   $error='<div class="alert alert-danger" role="alert"><p><strong>Oops</strong></p><br>'.$error.'</div>';
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>let's talk</title>
</head>
<link rel="stylesheet" href="index.css">
<body>
  <div id="main">
    <div id="error"><? echo $error; ?></div>
    <div id="info">

      <h2>login here</h2>

      <form action="" method="post">
        <label><b>Username</b></label>
        <input type="text" name="uname" placeholder="username"><br></input>
        <label><b>Password</b></label>
        <input type="text" name="pass" placeholder="Password"><br></input>
        <button style="background-color: #6495ed;color:white;" type= "submit" name="login">login</button>
      </form>

      <form action="" method="post">
        <h2> signup </h2>
        <label><b>Username</b></label>
        <input type="text" name="uname" placeholder="username"><br></input>
        <label><b>Email</b></label>
        <input type="text" name="email" placeholder="email"><br></input>
        <label><b>Password</b></label>
        <input type="text" name="password" placeholder="Password"><br></input>
        <label><b>Repeat-Password</b></label>
        <input type="text" name="rpassword" placeholder="repeat-password"><br></input>
        <button style="background-color: #6495ed;color:white;" type= "submit" name="signup">signup</button>
      </form>

    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
