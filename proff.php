<?php
include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="proff.css">
    
</head>
<body>
    
<div id="announcementBlock" class="announcement-block">
    <h3>
    Announcements</h3>
    <p id="announcementText">Initial announcement</p>
</div>
<!-- Search section -->
<div class="search-section p-4">
    <h3>Search</h3>
    <div class="row">
        <div class="col">
            <!-- First dropdown input -->
            <div class="dropdown mb-3">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="searchDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                    Select field
                </button>
                <ul class="dropdown-menu" aria-labelledby="searchDropdown1">
                    <li><a class="dropdown-item" href="#">Computer Science</a></li>
                    <li><a class="dropdown-item" href="#">Data Engineering</a></li>
                    <li><a class="dropdown-item" href="#">Artificial Intelligence</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <!-- Second dropdown input -->
            <div class="dropdown mb-3">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="searchDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                    Select class
                </button>
                <ul class="dropdown-menu" aria-labelledby="searchDropdown2">
                    <li><a class="dropdown-item" href="#">Computer Science 1</a></li>
                    <li><a class="dropdown-item" href="#">Computer Science 2</a></li>
                    <li><a class="dropdown-item" href="#">Computer Science 3</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <!-- Third dropdown input -->
            <div class="dropdown mb-3">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="searchDropdown3" data-bs-toggle="dropdown" aria-expanded="false">
                    Select module
                </button>
                <ul class="dropdown-menu" aria-labelledby="searchDropdown3">
                    <li><a class="dropdown-item" href="#">Cpp language</a></li>
                    <li><a class="dropdown-item" href="#">Algorithmics</a></li>
                    <li><a class="dropdown-item" href="#">UML</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-auto align-self-center">
            <!-- Search button -->
            <button class="btn btn-outline-secondary" type="button" id="button-addon">Search</button>
        </div>
    </div>
</div>









<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sélectionnez l'élément d'annonce
    var announcementText = document.getElementById('announcementText');

    // Définissez les annonces disponibles
    var announcements = [
        "First announcement.",
        "Second announcement.",
        "Third announcement."
    ];

    // Fonction pour mettre à jour l'annonce
    function updateAnnouncement() {
        // Sélectionnez un indice d'annonce aléatoire
        var randomIndex = Math.floor(Math.random() * announcements.length);
        // Mettez à jour le texte de l'annonce avec une annonce aléatoire
        announcementText.textContent = announcements[randomIndex];
    }

    // Mettez à jour l'annonce initialement
    updateAnnouncement();

    // Mettez à jour l'annonce périodiquement, par exemple, toutes les 5 secondes
    setInterval(updateAnnouncement, 5000);
});
</script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>







