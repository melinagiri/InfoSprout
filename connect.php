<?php

  session_start(); 
  // Database configuration
  $dbHost     = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbName     = "InfoSprout_db";

  // Create database connection
  $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

  // Check connection
  if ($db->connect_error) {
      die("Connection failed: " . $db->connect_error);
  }
  ?>  
    <!-- $connection = mysqli_connect($host, $username, $password, $database, 3306);
    
    3306 is default port used.
    
    // Check connection

    if(!$connection){
      echo "Failed to connect to MySQL!<br>".mysqli_connect_error();
    }else{      
      //connect db
      
      $database = mysqli_select_db($connection, "InfoSprout_db");
      if(!$database){
        echo "Failed to connect to db";
      }
      else{
        echo "db and server connected";
      }
    }
    
    $db = mysqli_select_db($connection, "InfoSprout_db");
    if($db){
      $query="SELECT * FROM register";
      $query_connect = mysqli_query($connection,$query);
      if($query_connect){
        while($f = mysqli_fetch_array($query_connect)){
          echo $f['FirstName'];
        }
      }
    }

    $query = "DROP DATABASE melina";
    $query_connect = mysqli_query($connection, $query);
    if($query_connect){
      echo "db created successfully";
    }else{
      echo "db creation unsuccessful";
    }
    
    $query="INSERT into register(FirstName,LastName,UserName,Email,Password,Gender,Category_type) VALUES('$first_name','$last_name','$user_name','$e_mail','$password','$gender','$category_type')";  
    if(mysqli_query($connection, $query)){
      echo "insertion successful";
    }else{
      echo "insertion unsuccessful";
    }         -->
 