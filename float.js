document.getElementById('exchange-modal').style.display = 'none';
document.addEventListener('click', function(e) {
    // Ouvrir
    if (e.target.closest('#float-btn')) {
        document.getElementById('exchange-modal').style.display = 'block';
    }
    // Fermer
    else if (e.target.closest('.close-modal') || e.target === document.getElementById('exchange-modal')) {
        document.getElementById('exchange-modal').style.display = 'none';
    }
});

