<?php
include 'connect.php';
if(isset($_POST['Submit'])){
    $user_name=$_POST['UserName'];
    $password=md5($_POST['Password']);
    $query= "SELECT * from register where UserName='$user_name' AND Password='$password'";  
    
    $query_connect = mysqli_query($connection,$query);
    if(mysqli_num_rows($query_connect)>0){

        $fetch_array= mysqli_fetch_array($query_connect);

        if($fetch_array['Category_type']=="Admin"){
            header('location:admin.php');
        }if($fetch_array['Category_type']=="User"){
            header('location:user.php');
        }else{
            echo "such category doesn't exist.";
        }
        
    }else{
        echo 'username or password does not exist';
    }
}
?>
<html> 
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <h3>Login Account</h3>
        <form method="POST" enctype="multipart/form-data">
            <div>Username: <input type="text" name="UserName"/></div>                        
            <div>Password: <input type="password" name="Password"/></div>          
            <div><input type="submit" value="Submit" name="Submit"/></div>
        </form>    
    </body>
</html>
