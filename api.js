// Récupère tous les personnages de l'API
function fetchAllCharacters() {
    return fetch("https://dragonball-api.com/api/characters")
        .then(response => response.json())
        .then(data => data.items); // Accède au tableau `items` contenant les personnages
}


async function displaySpecificCharacters(names) {
    const allCharacters = await fetchAllCharacters();

    // Filtrer les personnages par leur nom
    const selectedCharacters = allCharacters.filter(character => names.includes(character.name));

    // Affichage de chaque personnage sélectionné
    selectedCharacters.forEach(character => {
        // Vérifie la structure des données du personnage
        console.log(character); // <-- Inspectez la console pour voir les propriétés

        document.getElementById("characters").innerHTML += `
            <div class="character-carte">
                <img src="${character.image || 'placeholder.jpg'}" alt="${character.name}" />
                <h3>${character.name}</h3>
                <p>Ki : ${character.ki || "Non disponible"}</p>
                <p>Max Ki : ${character.maxKi || "Non disponible"}</p>
                <p>Race : ${character.race || "Non disponible"}</p>
                <p>Genre : ${character.gender || "Non disponible"}</p>
                <p>Affiliation : ${character.affiliation || "Non disponible"}</p>
            </div>
        `;
    });
}

// Liste des noms de personnages à afficher
displaySpecificCharacters(["Piccolo", "Vegeta", "Gohan" , "Goku"]);
