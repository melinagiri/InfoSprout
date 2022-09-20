<?php
include 'connect.php';
if(isset($_POST['sub'])){
    $f=$_POST['fname'];
    $l=$_POST['lname'];
    $u=$_POST['uname'];
    $m=$_POST['mail'];
    $p=$_POST['pass'];
    $g=$_POST['gen'];

    $tempname = $_FILES['f1']['tmp_name'];
    $filename = $_FILES['f1']['name'];
    $folder = "assests".$filename;
 
    if($filename){
        move_uploaded_file($tempname, $folder);
        $img=$folder;
    }
    $i="INSERT into register(fname, lname, uname, mail, pass, gen, image)value('$f','$l','$u','$m','$p','$g','$img')";
    // Execute query
    mysqli_query($con, $i);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input name="fname" class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">First name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input name="lname" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                        <label for="inputLastName">Last name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input name="pass" class="form-control" id="inputPassword" type="password" placeholder="Create a password" />
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input name="c_pass" class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" />
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input name="mail" class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
                                                        <label for="inputEmail">Email address</label>
                                                    </div> 
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input name="uname" class="form-control" id="inputEmail" placeholder="name@example.com" />
                                                        <label for="inputEmail">Username</label>
                                                    </div> 
                                                </div>
                                            </div>  
                                            <div class="form-floating mb-3">                                                
                                                Profile Image: <input id="inputEmail" type="file" name="f1"/>
                                            </div> 
                                            <div class="form-floating mb-3">
                                                Gender: <input id="inputEmail" type="radio" name="gen" value= "male" placeholder="name@example.com" />Male
                                                <input id="inputEmail" type="radio" name="gen" value= "female" placeholder="name@example.com" />Female
                                            </div> 
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input name="sub" type="submit" value="Create Account" class="btn btn-primary btn-block" href="login.php"></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; InfoSprout 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
