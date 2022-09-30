<?php
    include 'connect.php';
    if(isset($_POST['Submit'])){
        $first_name=$_POST['FirstName'];
        $last_name=$_POST['LastName'];
        $user_name=$_POST['UserName'];
        $e_mail=$_POST['Email'];
        $password=md5($_POST['Password']);
        $confirm_password=$_POST['Confirm_Password'];
        $gender=$_POST['Gender'];
        $category_type=$_POST['Category_type'];    
        // echo $first_name; echo "</br>";
        // echo $last_name;echo "</br>";
        // echo $user_name;echo "</br>";
        // echo $e_mail;echo "</br>";
        // echo $password;echo "</br>";
        // echo $confirm_password;echo "</br>";
        // echo $gender;echo "</br>";
        // echo $category_type;echo "</br>";      
               

        $query="INSERT into register(FirstName,LastName,UserName,Email,Password,Gender,Category_type) VALUES('$first_name','$last_name','$user_name','$e_mail','$password','$gender','$category_type')";          
        if(mysqli_query($connection,$query)){
            echo '<script type ="text/JavaScript">';  
            echo 'alert("insertion successful now you redirect to login page")';
            echo '</script>';  
            
            
        }else{
            echo "insertion unsuccessful";
        }        
    }
?>
<!DOCTYPE html>
<head>
    <title>Register - InfoSprout</title>
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <h3>Register Account</h3>
        <div>
            <input name="FirstName" type="text" placeholder="Enter your first name" />
            <label>First name</label>
        </div>

        <div>
            <input name="LastName" type="text" placeholder="Enter your last name" />
            <label>Last name</label>
        </div>

        <div>
            <input name="UserName" type="text" placeholder="Create an username" />
            <label>Username</label>
        </div>

        <div>
            <input name="Email" type="email" placeholder="name@example.com" />
            <label>Email address</label>
        </div>

        <div>
            <input name="Password" type="password" placeholder="Create a password" />
            <label>Password</label>
        </div>

        <!-- <div>
            <input name="Confirm_Password" type="password" placeholder="Confirm password" />
            <label>Confirm Password</label>
        </div> -->

        <!-- <div>
            Profile Image: <input type="file" name="f1" />
        </div>       -->

        <div>
            Gender: <input name="Gender" type="radio" value="male" />Male
            <input name="Gender" type="radio" value="female" />Female
        </div>

        <div>
            <label>Category type:</label>
            <select name="Category_type">
                <option value="User">User</option>
                <option value="Admin">Admin</option>
            </select>
        </div>  
        
        <div>
            <input name="Submit" type="submit" value="Create Account">
        </div>
        
    </form>

    <div>
        <a href="login.php">Have an account? Go to login</a>
    </div>

</body>

</html>