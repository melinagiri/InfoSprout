<?php
    include 'connect.php';

    $user_name=$_POST['UserName'];
    $role=$_POST['Role'];
    $district=md5($_POST['District']);
    $ward_no=$_POST['Ward_no'];
    $province_no=$_POST['Province_no'];

    $statusMsg = '';

    if(isset($_POST["Submit"])){
        
        $select = $db->query("SELECT * FROM register WHERE UserName = '".$_POST['UserName']."'");
        if(mysqli_num_rows($select)) {
            echo 'This username exists!!<br>';
            if(mysqli_num_rows($select)) {
                // Insert into database
                $query=$db->query("INSERT into Professional_table(UserName,Role,District,Ward_no,Province_no) VALUES('$user_name','$role','$district','$ward_no','$province_no')");          
    
                if($query){
                        $statusMsg = "Values uploaded successfully!!";
                }else{
                    $statusMsg = 'Submission failed!!';
                }
            }
        }else{
            exit('This username doesnot exists');
        }
        
    }    

    // Display status message
    echo $statusMsg;
?>