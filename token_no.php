<?php

  include 'connect.php';
$token_no=mt_rand(100000, 999999);
// echo $appnumber;

$query= $db->query("SELECT floor(rand()* 99999) As random_num FROM numbers_mst WHERE 'random_num' NOT IN (SELECT my_number FROM numbers_mst) LIMIT 1");

?>