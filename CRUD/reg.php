<?php
include 'connect.php';
if(isset($_POST['sub'])){
    $t=$_POST['name'];
    $u=$_POST['user'];
    $p=$_POST['pass'];
    $c=$_POST['city'];
    $g=$_POST['gen'];

    $tempname = $_FILES['f1']['tmp_name'];
    $filename = $_FILES['f1']['name'];
    $folder = "image".$filename;
 
    if($filename){
        move_uploaded_file($tempname, $folder);
        $img=$folder;
    }
    $i="INSERT into reg(name,username,password,city,image,gender)value('$t','$u','$p','$c','$img','$g')";
    // Execute query
    mysqli_query($con, $i);
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Name <input type="text" name="name">
                </td>
            </tr>
            <tr>
                <td>
                    Username <input type="text" name="user">
                </td>
            </tr>
            <tr>
                <td>
                    Password <input type="password" name="pass">
                </td>
            </tr>
            <tr>
                <td>
                    City <select name="city">
                            <option value="">-select-</option>
                            <option value="kth">kathmandu</option>
                            <option value="ltr">lalitpur</option>
                            <option value="other">other</option>
                </td>
            </tr>
            <tr>
                <td>
                    Gender  <input type="radio" name="gen" id="gen" value="male">Male
                            <input type="radio" name="gen" id="gen" value="female">Female
                </td>
            </tr>
            <tr>
                <td>
                    Image <input type="file" name="f1">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="submit" name="sub">       
                </td>
            </tr>
        </table>
    </body>
</html>
