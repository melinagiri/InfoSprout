<?php 
  session_start();

    // echo "Connected to db";
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "test";
    $con = mysqli_connect($host, $username, $password, $database, 3306);
    //3306 is default port used.
    // echo "Connected successfully".$con;
    // Check connection

    // if(!$con){
    //   echo "Failed to connect to MySQL!<br/>".mysqli_connect_error();
    // }else{
    //   echo "Connected to server<br/>";
    // }

    //connect db
    
    // $database = mysqli_select_db($con, "test");
    // if(!$database){
    //   echo "Failed to connect to db";
    // }
    // else{
    //   echo "db connected";
    // }
    

    // $query = "DROP DATABASE melina";
    // $query_run = mysqli_query($con, $query);
    // if($query_run){
    //   echo "db created successfully";
    // }else{
    //   echo "db creation unsuccessful";
    // }

    // $db = mysqli_select_db($con, "test");
    // if($db){
    //   $query="SELECT * FROM reg";
    //   $query_result = mysqli_query($con,$query);
    //   if($query_result){
    //     while($f = mysqli_fetch_array($query_result)){
    //       echo $f['name'];
    //     }
    //   }
    // }
?>