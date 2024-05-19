<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "gumi2004";
    $dbname = "database";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $fullname = $_POST['fullname'];
    $academic_email = $_POST['academic_email'];
    $personal_email = $_POST['personal_email'];
    $cne = $_POST['cne'];
    $educational_level = $_POST['educational_level'];

    $sql = "INSERT INTO demandes (fullname, academic_email, personal_email, cne, educational_level) VALUES ('$fullname', '$academic_email', '$personal_email', '$cne', '$educational_level')";

    if ($conn->query($sql) === TRUE) {
        $message = "Your request has been registered.";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <title>Edu-Serve ENSAH</title>
</head>
<body style="background:white;">
    <div class="container d-flex justify-content-center align-items-center min-vh-100" >
        <div >
            <div class="row border rounded-top " style="background:#0C359E;">
                <div class="col-md-3 ">
                    <img src="images/white.png" style="width: 100px;">
                </div>
                <div class="col-md-9">
                    <h4 style="font-size: 30px; color:white;">Password recovery request </h4>
                </div>
            </div>
            <div class="row border rounded-bottom" style="background:#d9dde7;">
                <div class="col-md-12">
                    
                    <form class="w-100 " id="passwordRecoveryForm " action="" method="post">
                        <p style=" padding-left:6px;padding-top: 4px;">Please fill in the form to resolve your problem.<br>Be careful to fill in it with incorrects informations!</p>
                        <div class="form-group p-2 " > 
                            <input type="text" class="form-control" placeholder="Enter your fullname" required name="fullname">
                        </div>
                        <div class="form-group p-2 ">
                            <input type="email" class="form-control" id="emailInput" aria-describedby="emailHelp" placeholder="Enter your academic email" required name="academic_email">
                        </div>
                        <div class="form-group p-2 ">
                            <input type="email" class="form-control"  aria-describedby="emailHelp" placeholder="Enter your personal email" required name="personal_email" >
                        </div>
                        <div class="form-group p-2 ">
                            <input type="text" class="form-control" placeholder="Enter your CNE" required name="cne">
                        </div>
                        <div class="form-group p-2 ">
                            <input type="text" class="form-control" placeholder="Enter your educational level" required name="educational_level">
                        </div>
                        <div class="p-2" style="margin-bottom: 20px;">
                            <button  class="btn btn-lg w-100 " type="submit" style="background-color: #0C359E; color:white;" >Submit</button>
                        </div>
                    </form>
                    <?php if(isset($message)) { ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $message; ?>
                        </div>
                    <?php } ?>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>
