document.addEventListener('DOMContentLoaded', function() {
    let currentIndex = 0;
    const images = document.querySelectorAll('.photoaccueil img');

    function showNextImage() {
        // Retire la classe 'active' de l'image actuelle
        images[currentIndex].classList.remove('active');

        // Passe à l'image suivante (et revient à 0 si on est à la dernière image)
        currentIndex = (currentIndex + 1) % images.length;

        // Ajoute la classe 'active' à la nouvelle image
        images[currentIndex].classList.add('active');
    }

    // Affiche la première image au chargement
    images[currentIndex].classList.add('active');

    // Défilement automatique toutes les 3 secondes
    setInterval(showNextImage, 3000);
});
