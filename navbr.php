<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Example</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="navbr.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
<!-- Barre de navigation verticale -->
<div class="vertical-navbar">
    <img src="images/white.png" alt="">
    <a href="#">-Schedule</a>
    <a href="#">-Modules</a>
    <a href="#">-Lessons</a>
    <a href="AddMarks.php">-Marks</a>
    <a href="#">-Profil</a>
    <a href="#">-Contact</a>
    
      
   
</div>

<!-- Barre de navigation horizontale -->
<nav class="navbar navbar-expand-lg horizontalnavbar">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Consult 
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Schedule</a>
                        <a class="dropdown-item" href="#">Announcements</a>
                    </div>
                </li>
                <li class="nav-item">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn  btn-sm my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </li>
                
            </ul>
            <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Account
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#" >Log Out</a>
                </div>
            </li>
        </ul>
            
        </div>
    </div>
</nav>





<!-- jQuery and Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>