<!-- type - customer category(guest-0, public(service consumer)-1, service provider-2(secretary-20, president-21, accountant-22), admin-3)
1. create user table with username, pwd(md5 hashing), email, contact, type
2. develop a common login page for all user
3.  redirect to associative dashboard for each type of user by checking the type field of successful login
4. create a form to get birthcertificate and allow valid user(public-1), to submit birth certificate form
5. allow service provider(with successful login) to see and process form submitted by end user -->
<?php
    include 'connect.php';

    $first_name=$_POST['FirstName'];
    $last_name=$_POST['LastName'];
    $user_name=$_POST['UserName'];
    $e_mail=$_POST['Email'];
    $password=md5($_POST['Password']);
    $confirm_password=$_POST['Confirm_Password'];
    $gender=$_POST['Gender'];
    // $category_type=$_POST['Category_type']; 

    // echo $first_name; echo "</br>";
    // echo $last_name;echo "</br>";
    // echo $user_name;echo "</br>";
    // echo $e_mail;echo "</br>";
    // echo $password;echo "</br>";
    // echo $confirm_password;echo "</br>";
    // echo $gender;echo "</br>";
    // echo $category_type;echo "</br>"; 

    $statusMsg = '';

    // File upload path
    $targetDir = "register/";
    $fileName = basename($_FILES["Profile_file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    if(isset($_POST["Submit"])){
        
        $select = $db->query("SELECT * FROM register WHERE UserName = '".$_POST['UserName']."'");

        if(mysqli_num_rows($select)) {
            exit('This username already exists');
        }
        if(!empty($_FILES["Profile_file"]["name"])){
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif','pdf');

            if(in_array($fileType, $allowTypes)){

                // Upload file to server
                if(move_uploaded_file($_FILES["Profile_file"]["tmp_name"], $targetFilePath)){

                    // Insert image file name into database
                    $query=$db->query("INSERT into register(FirstName,LastName,UserName,Email,Password,Gender,Status,Category_type,Profile_file,Uploaded_on) VALUES('$first_name','$last_name','$user_name','$e_mail','$password','$gender','Unassigned','User','$fileName', NOW())");          

                    if($query){
                            // $statusMsg = "Form has been uploaded successfully.";
                            header('location:login.php');
                    }else{
                        $statusMsg = "File upload failed, please try again.";
                    } 
                }else{
                    $statusMsg = "Sorry, there was an error uploading your file.";
                }
            }else{
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
            }
        }else{
            $statusMsg = 'Please select a file to upload.';
        }
    }else{
        $statusMsg = 'Submission failed';
    }

    // Display status message
    echo $statusMsg;
?>