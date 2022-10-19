<?php
    include 'connect.php';

    $first_name=$_POST['First_name']; 
    $middle_name=$_POST['Middle_name'];
    $last_name=$_POST['Last_name'];
    $birth_date=$_POST['Birth_date'];
    $birth_day=$_POST['Birth_day'];
    $birth_time=$_POST['Birth_time'];
    $birth_place=$_POST['Birth_place'];
    $baby_weight=$_POST['Baby_weight'];
    $gender=$_POST['Gender'];
    $e_mail=$_POST['Email'];
    $contact_no=$_POST['Contact_no'];
    $citizenship_no=$_POST['Citizenship_no'];

    $token_no=mt_rand(100000000,999999999);

    //echo $citizenship_no;    
    
    $statusMsg = '';

    // File upload path
    $targetDir = "registration_form_documents/";
    $citizenship_file = basename($_FILES["Citizenship_file"]["name"]);
    $targetFilePath = $targetDir . $citizenship_file;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    if(isset($_POST["Submit"])){
        
        $select = $db->query("SELECT * FROM registration_form WHERE Token_no = '$token_no'");

        if(!mysqli_num_rows($select)) {
            // exit('This token_no doesnot exists');
        
            if(!empty($_FILES["Citizenship_file"]["name"])){
                // Allow certain file formats
                $allowTypes = array('jpg','png','jpeg','gif','pdf');

                if(in_array($fileType, $allowTypes)){
                    // Upload file to server
                    if(move_uploaded_file($_FILES["Citizenship_file"]["tmp_name"], $targetFilePath)){

                        // Insert image file name into database
                        $query=$db->query("INSERT into registration_form(First_name,Middle_name,Last_name,Birth_date,Birth_day,Birth_time,Birth_place,Baby_weight,Gender,Email,Contact_no,Citizenship_no,Citizenship_file,Uploaded_on,Token_no) VALUES('$first_name','$middle_name','$last_name','$birth_date','$birth_day','$birth_time','$birth_place','$baby_weight','$gender','$e_mail','$contact_no','$citizenship_no','$citizenship_file',NOW(),'$token_no')");                 

                        if($query){
                                $statusMsg = "Form has been uploaded successfully.";                            
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
            $statusMsg = 'Token Number generated already exist! Your form isnot submitted! Sorry for inconvenience!';
            
        }
    }else{
        $statusMsg = 'Submission failed';
    }

    // Display status message
    echo $statusMsg;
?>