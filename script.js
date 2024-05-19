document.addEventListener("DOMContentLoaded", function() {
    var images = document.querySelectorAll('.images-Box img');
    var currentIndex = 0;
    
    setInterval(function() {
        images[currentIndex].style.display = 'none';
        currentIndex = (currentIndex + 1) % images.length;
        images[currentIndex].style.display = 'block';
    }, 3000); // Adjust the timing (milliseconds) as needed
});