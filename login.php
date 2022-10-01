<?php
include 'connect.php';
if(isset($_POST['Submit'])){
    $user_name=$_POST['UserName'];
    $password=$_POST['Password'];
    $query= "SELECT * from register where UserName='$user_name' AND Password= '$password'";   
    
    $query_result = mysqli_query($connection,$query);
    if(mysqli_num_rows($qu)>0){
        $fetch_array= mysqli_fetch_array($qu);
        $_SESSION['id']=$fetch_array['id'];
        // header ('location:home.php');
    }
    else{
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
