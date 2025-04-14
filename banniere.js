document.addEventListener('DOMContentLoaded', function() {
    let currentIndex = 0;
    const images = document.querySelectorAll('.photoaccueil img');

    function showNextImage() {
       
        images[currentIndex].classList.remove('active');

        
        currentIndex = (currentIndex + 1) % images.length;

        
        images[currentIndex].classList.add('active');
    }

    
    images[currentIndex].classList.add('active');

    
    setInterval(showNextImage, 3000);
});
