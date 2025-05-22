document.addEventListener('DOMContentLoaded', () => {
    const deballerButton = document.getElementById('deballer');

    if (!deballerButton) return;

    deballerButton.addEventListener('click', async () => {
        try {
            const characters = await fetchCharacters();
            const randomCharacters = getRandomCharacters(characters, 5);

            const response = await fetch('profil.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ cards: randomCharacters })
            });

            const result = await response.text(); // on peut afficher ou rediriger

            // On redirige une fois le POST terminé
            if (response.ok) {
                window.location.href = 'profil.php';
            } else {
                console.error('Erreur lors de l’envoi des cartes.');
            }
        } catch (error) {
            console.error("Erreur:", error);
        }
    });
});

async function fetchCharacters() {
    const response = await fetch('https://dragonball-api.com/api/characters?limit=60');
    const data = await response.json();
    return data.items || data; // selon structure
}

function getRandomCharacters(characters, number) {
    return characters
        .sort(() => 0.5 - Math.random())
        .slice(0, number);
}
