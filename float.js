document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('exchange-modal');
    const floatBtn = document.getElementById('float-btn');
    const closeModal = document.querySelector('.close-modal');

    // Masquer le modal au chargement
    modal.style.display = 'none';

    document.addEventListener('click', function(e) {
        // Ouvrir le modal
        if (e.target.closest('#float-btn')) {
            modal.style.display = 'block';
        }
        // Fermer le modal si on clique sur le fond ou sur le bouton de fermeture
        else if (e.target.closest('.close-modal') || e.target === modal) {
            modal.style.display = 'none';
        }
    });
});

