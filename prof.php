<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="prof.css">
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <title>Espace du professeur</title>
</head>
<body>
<div class="row pull-right" >
<div class="col-md-3 p-0">
  <nav class="navbar navbar-expand-md navbar-dark" style=" background-color: #0C359E;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav" >
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 text-center mb-3">
            <a class="navbar-brand" href="#">
              <img src="assets/logo2.png" alt="Logo">
            </a>
          </div>
        <div class="col-12">
          <ul class="navbar-nav flex-column " style="margin-left: 20px; justify-content: center; margin-bottom: 80px;">
           <li class="nav-item">
          <a class="nav-link" href="#" style="font-size: 25px;">Profil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="font-size: 25px;">Add lessons</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="AddMarks.php" style="font-size: 25px;">Add marks</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="font-size: 25px;">Contact</a>
        </li>
        
      </ul>
        </div>
        <div class="dropdown dropup">
          <a class="nav-link dropdown-toggle" href="#" role="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;">
              <!-- Profile picture -->
              <img src="assets/profil.png" alt="Profile Picture" class="profile-picture img rounded-circle " style="height: 40px;">
              <!-- Professor's name -->
              <span class="professor-name" style="margin-left: 10px;">El wardani Dadi</span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="profileDropdown">
              <!-- Dropdown items -->
              <li><a class="dropdown-item" href="#">Edit Profile</a></li>
              <li><a class="dropdown-item" href="#">Change Password</a></li>
              <li><a class="dropdown-item" href="#">Disconnect</a></li>
          </ul>
      </div>
    </div>
  </nav>
</div>
<div class="col-md p-0">
<nav class="navbar navbar-expand-lg" style="background-color: #d9dde7;width: 100%;">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item p-3">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item p-3">
          <a class="nav-link" href="#">Profil</a>
        </li>
        <li class="nav-item p-3 dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Consult
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Schedule</a></li>
            <li><a class="dropdown-item" href="#">Announcements</a></li>
            <li><a class="dropdown-item" href="#">Modules</a></li>
          </ul>
        </li>
        <li class="nav-item p-3">
          <a class="nav-link ">Contact</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
</nav>
<div class="container mt-4">
  <div class="row justify-content-between">
    <div class="col-lg-7">
      <div class="announcement-section p-4">
        <div class="d-flex align-items-center mb-3">
          <img src="assets/announcement_logo.jpg" alt="Announcement Logo" style="height: 50px; margin-right: 10px;">
          <h3 class="mb-0">Announcement</h3>
        </div>
        <p id="announcement" class="announcement-text">This is an important announcement. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="contact-form p-4">
        <h3 >Contact </h3>
        <form>
          <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter your name">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Your Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your email">
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" rows="4" placeholder="Enter your message"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
    <div class="container">
      <div class="row">
          <div class="col-lg-3">
              <!-- Empty column to maintain layout -->
          </div>
          <div class="col-lg-6 ">
            <div class="row justify-content-center">
              <div class="col-lg-4">
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
                      <div class="col-auto align-self-center">
                          <!-- Search button -->
                          <button class="btn btn-outline-secondary" type="button" id="button-addon">Search</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
</div>
</div>
</div>
<script>

// Get the announcement element
const announcementElement = document.querySelector('.announcement-text');

// Define an array of announcements
const announcements = [
  "This is an important announcement. Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
  "Another important announcement. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
  "Yet another announcement. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."
];

// Function to update the announcement
function updateAnnouncement() {
  // Get a random announcement from the array
  const randomIndex = Math.floor(Math.random() * announcements.length);
  const randomAnnouncement = announcements[randomIndex];
  // Update the text content of the announcement element
  announcementElement.textContent = randomAnnouncement;
}

// Update the announcement initially
updateAnnouncement();

// Update the announcement periodically, for example, every 5 seconds
setInterval(updateAnnouncement, 5000); // Change 5000 to the desired interval in milliseconds

</script>
</body>
</html>