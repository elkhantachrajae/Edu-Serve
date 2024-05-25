<?php
include "navbr.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="proff.css">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  
    
</head>
<body>
    <style>
        *{
            font-family: 'Times New Roman', Times, sans-serif;
        }
        .announcement-block {
            position: absolute;
            top: 160px; /* Ajustez cette valeur selon la hauteur de votre barre de navigation verticale */
            bottom: 0;
            left: 100%; /* Centrer horizontalement */
            width: 30%; /* Ajustez la largeur selon vos préférences */
            height: 50%;
            margin-left: -35%; /* Déplacez le bloc de moitié de sa largeur vers la gauche pour le centrer */
            border:2px solid #0C359E;  /* Ajustez la couleur de fond selon vos préférences */
            padding: 10px;
            overflow-y: auto; /* Ajoutez un défilement vertical si nécessaire */
            border-radius: 10px;
            background-color: white;
        }
        .title{
           font-size: 30px;
           color: #0C359E; 
           margin-top: 20px;
        }
        .search-section{
            float: left;
            border-radius:5px;
           border:2px solid #0C359E; 
           width:500px;
           margin-left: 230px;
           margin-top:30px;
        }
        .announcement-block h3{
          color: #0C359E;
          }
        #announcementText{
            background-color: #0C359E;
            border-radius: 5px;
            height: 100px;
            color: white;
           padding-top: 20px;
           margin-top: 40px;
        }
        .drp{
            width:300px;
            color:#0C359E;
            border: 1px solid #0C359E;
        }
        .drp:hover{
            background-color: #0C359E;
            color: white;
        }
        .title-search{
         font-weight: bold;
        }

    </style>
    
<div id="announcementBlock" class="announcement-block">
    <h3 class="text-center">
    Announcements</h3>
    <p id="announcementText" class="text-center">Notice to All Engineering Professors: Department Meeting</p>
</div>
<div class="container">
        <div class="row">
            <div class="col-8">
                <h3 class="title text-center">Welcome to EDU SERVE ENSAH</h3>
            </div>
        </div>
    </div>

<!-- Search section -->
<div class="search-section p-4">
    <h3 class="title-search" >Search Modules</h3>
    <div class="row">
        <div class="col">
            <!-- First dropdown input -->
            <div class="dropdown mb-3">
                <button class="btn btn-outline-secondary dropdown-toggle drp" type="button" id="searchDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
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
                <button class="btn btn-outline-secondary dropdown-toggle drp" type="button" id="searchDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
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
                <button class="btn btn-outline-secondary dropdown-toggle drp" type="button" id="searchDropdown3" data-bs-toggle="dropdown" aria-expanded="false">
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
            <button class="btn btn-outline-secondary drp" type="button" id="button-addon">Search</button>
        </div>
    </div>
</div>









<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sélectionnez l'élément d'annonce
    var announcementText = document.getElementById('announcementText');

    // Définissez les annonces disponibles
    var announcements = [
        "Notice to All Engineering Professors: Department Meeting",
        "Notice to All Engineering Professors: Academic Calendar Update.",
        "Notice to All Engineering Professors: Job Opportunity",
        "Notice to All Engineering Professors: Schedule update"
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



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>