<?php
include 'connect.php';
$sq="DELETE from reg where id='$_SESSION[id]'";
mysqli_query($con,$sq);
header('location:home.php');
?>