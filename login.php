<?php
session_start();
include 'db.php';
$error= "";
if(!$_POST['uname']){
  $error.="write username";
}
if(!$_POST['pass']){
  $error.="write password";
}


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
         $error.="password incorrect enter right password";
       }
     }
     else{
       $error.="wrong id or password entered";
     }
   }

 if($error!=""){
   $error='<div class="alert alert-danger" role="alert"><p><strong>Oops</strong></p><br>'.$error.'</div>';
 }
?>
