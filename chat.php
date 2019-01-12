<?php
include 'db.php';
$query = "SELECT * FROM posts";
$result = mysqli_query($link,$query);

if($result) {
 while($row = mysqli_fetch_array($result))
 echo "" . $row["name"]. " " . ":: " . $row["msgs"]." --" .$row["date"]. "<br>";
 echo "<br>";
}
else{
 echo "no msg";
}

?>
