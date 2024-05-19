<?php
$erreur = "";

if(isset($_POST['button'])){
    if(isset($_POST['email']) && isset($_POST['password'])){
        $servername="localhost";
        $user="root";
        $pass="";
        $databasename="l";
     
        $email=$_POST['email'];
        $password=$_POST['password'];
     
        $con=mysqli_connect($servername,$user,$pass,$databasename);
        $req=mysqli_query($con,"SELECT * FROM etudiants WHERE email='$email' AND password='$password'");
        $num_ligne=mysqli_num_rows($req);

        if($num_ligne >= 1){
            $user_type = 'etudiant';
        } else {
            $req=mysqli_query($con,"SELECT * FROM prof WHERE email='$email' AND password='$password'");
            $num_ligne=mysqli_num_rows($req);

            if($num_ligne >= 1){
                $user_type = 'professeur';
            } else {
                $erreur = "Adress email or password invalid!";
            }
        }

        mysqli_close($con);
        
        if(isset($user_type)){
            if($user_type === 'etudiant'){
                header("Location: bienvenue.php");
            } elseif($user_type === 'professeur'){
                header("Location: prof.php");
            }
            exit();
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Edu-Serve ENSAH</title>
</head>
<body >
    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <div class="row border rounder-5 p-3 bg-white shadow box-area">

            <div class="col-md-6 rounder-4 d-flex justify-content-center align-items-center flex-column left-box" style="background:#0C359E;" >
                <div class="featured-image mb-3">
                    <img src="images/white.png" class="img-fluid" style="width:250px;">
                </div>
            </div>

            <div class="col-md-6 right-box w-70 p-5" >
                <div class="row align-items-center ">
                    <div class="header-text text text-center mb-3">
                        <h2>Welcome to EDU SERVE !</h2>
                        <h6>We are at your service for all your needs.</h6>
                    </div>

                    <form action="" method="POST">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control form-control-lg bg-light fs-6" placeholder="Enter your academic email" name="email">
                        </div>
                        <div class="input-group mb-1">
                            <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Enter your password" name="password">
                        </div>
                        <div class="input-group mb-4 d-flex justify-content-between">
                            <div class="forgot">
                                <small><a href="password.php">Forgot Password?</a></small>
                            </div>
                        </div>
                        <div class=" mb-3">
                            <button class="btn btn-lg w-100 fs-6" style="background-color: #0C359E; color:white;" name="button">Login</button>
                        </div>

                    </form>
                    <div class="row text text-center" style=" margin-bottom: 20px;">
                       <small>If you don't have an account contact the administration !</small>
                    </div>
                   <?php 
                    if(!empty($erreur)){
                        echo '<div class="alert alert-danger" role="alert">' . $erreur . '</div>';
                    }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>



    
</body>
</html>