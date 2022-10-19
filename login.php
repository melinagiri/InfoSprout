<?php
include 'connect.php';
if(isset($_POST['Submit'])){
    $user_name=$_POST['UserName'];
    $password=md5($_POST['Password']);
    $query= $db->query("SELECT * from register where UserName='$user_name' AND Password='$password'");  

    if($query->num_rows > 0){
        $row = $query->fetch_assoc();

        if($row['Category_type']=="Admin"){
            header('location:admin.html');  

        }elseif($row['Category_type']=="User"){
            header('location:user.html');
            
        }else{
            echo "Such category doesn't exist!!";
        }
        
    }else{
        echo 'Username or password does not exist!!!';
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
