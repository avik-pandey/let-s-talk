 <?php

session_start();
include 'db.php';

$query="INSERT INTO `posts` (`msgs`,`name`) VALUES ('".mysqli_real_escape_string($link,$_POST['msg'])."','".mysqli_real_escape_string($link,$_SESSION['name'])."')";
$result=mysqli_query($link,$query);
if($result){
  header('location:home.php');
}
  ?>
