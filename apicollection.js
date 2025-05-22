document.addEventListener('DOMContentLoaded', () => {
    // Récupère tous les personnages de l'API
    function fetchAllCharacters() {
        return fetch("https://dragonball-api.com/api/characters?limit=60")
            .then(response => response.json())
            .then(data => data.items); 
    }

    async function displayAllCharacters() {
        const allCharacters = await fetchAllCharacters();
        const container = document.getElementById("characters-collection");
        container.innerHTML = '';

        allCharacters.forEach(character => {
            const carte = document.createElement('div');
            carte.classList.add('character-carte');

            carte.innerHTML = `
                <a href="carte.html?id=${character.id}" class="character-link">
                    <img src="${character.image || 'placeholder.jpg'}" alt="${character.name}" />
                    <h3>${character.name}</h3>
                    <p>Race : ${character.race || "Non disponible"}</p>
                    <p>Affiliation : ${character.affiliation || "Non disponible"}</p>
                </a>
                <button class="favorite-btn">
                    <i class="fa-regular fa-heart"></i>
                </button>
            `;

            container.appendChild(carte);
        });
    }

    displayAllCharacters();
});
