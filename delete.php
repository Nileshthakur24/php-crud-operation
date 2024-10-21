<?php

include("config.php");
$id=$_GET['id'];
$query="DELETE FROM crud WHERE id = '$id'";
$run=mysqli_query($conn,$query);

if ($run) {
    header("location:index.php");   
}
else
{
    echo "Error";
}


?>