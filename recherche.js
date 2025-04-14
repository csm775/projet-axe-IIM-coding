document.addEventListener('DOMContentLoaded', displayCharacters);

// Récupération des données de l'API Dragon Ball
async function fetchCharacters() {
    const response = await fetch('https://dragonball-api.com/api/characters?limit=60');
    const data = await response.json();
    return data.items; // Notez le .items pour l'API Dragon Ball
}

async function displayCharacters() {
    let characters = await fetchCharacters();
    if (!characters) return;

    // Sélection de l'id HTML
    let container = document.getElementById('characters-collection');
    container.innerHTML = ''; 

    characters.forEach(character => {
        // Récupération des propriétés du personnage Dragon Ball
        container.innerHTML += `
        <div class="character-carte" data-name="${character.name.toLowerCase()}">
            <img src="${character.image || 'placeholder.jpg'}" alt="${character.name}" />
            <h3>${character.name}</h3>
            <p>Ki: ${character.ki || 'Non disponible'}</p>
            <p>Max Ki: ${character.maxKi || 'Non disponible'}</p>
            <p>Race: ${character.race || 'Non disponible'}</p>
            <p>Genre: ${character.gender || 'Non disponible'}</p>
            <p>Affiliation: ${character.affiliation || 'Non disponible'}</p>
        </div>`;
    });
}

// Déclenchement de l'événement à l'écriture dans la barre de recherche
document.getElementById('barre-recherche').addEventListener('input', (event) => {
    let searchValue = event.target.value.toLowerCase();
    let cards = document.querySelectorAll('.character-carte');
    cards.forEach(card => {
        let name = card.getAttribute('data-name');
        // Affiche ou non les cartes qui correspondent à la recherche 
        card.style.display = name.includes(searchValue) ? 'block' : 'none';
    });
});