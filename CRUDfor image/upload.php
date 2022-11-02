<?php
include 'connect.php';

$target_dir = "Documents/";
$image_name = basename( $_FILES["f1"]["name"]);
$target_file = $target_dir.$image_name;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$tempname = $_FILES['f1']['tmp_name'];

// $uploadOk = 1;

// $t=$_POST['name'];
// $u=$_POST['user'];
// $p=$_POST['pass'];
// $c=$_POST['city'];
// $g=$_POST['gen'];


// Check if image file is a actual image or fake image
if(isset($_POST["sub"])) {
  if(!empty($image_name)){
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($imageFileType, $allowTypes)){
      // Upload file to server
      if($_FILES['f1']['size'] < 500000){
        if (move_uploaded_file($tempname, $target_file)) {
          echo "The file ". htmlspecialchars( $image_name). " has been uploaded.";
          echo "Your account has been created !";
          // $i="INSERT into reg(name,username,password,city,image,gender)value('$t','$u','$p','$c','$image_name','$g')";
          $r=mysqli_query($con, $i);
        } else {
          echo "Sorry, there was an error uploading your file.";
        }
      }else{
        $statusMsg = 'Sorry, your file size is too large.';
      }
    }else{
      $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
      // header("Location:register.html?msg=".$statusMsg);
    }
  }else{
    $statusMsg = 'Please select a file to upload.';
    // header("Location:register.html?msg=".$statusMsg);
  }
  echo $statusMsg;
}
?>