document.addEventListener('DOMContentLoaded', function() {
    // commence à 0 = première image
    let currentIndex = 0;
    
    // Sélectionne toutes les images du carrousel
    const images = document.querySelectorAll('.photoaccueil img');

    // Fonction pour passer à l'image suivante
    function showNextImage() {
        
        images[currentIndex].classList.remove('active');

        // Calcule l'index de la prochaine image 
        currentIndex = (currentIndex + 1) % images.length;

        // Ajoute la classe 'active' à la nouvelle image (l'affiche)
        images[currentIndex].classList.add('active');
    }

    images[currentIndex].classList.add('active');

    // Change d'image toutes les 3 secondes (3000ms)
    setInterval(showNextImage, 3000);
});