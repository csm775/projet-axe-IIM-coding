// Récupère tous les personnages de l'API
function fetchAllCharacters() {
    return fetch("https://dragonball-api.com/api/characters?limit=60")
        .then(response => response.json())
        .then(data => data.items); 
}

async function displayAllCharacters() {
    const allCharacters = await fetchAllCharacters();

    // Affichage de chaque personnage sélectionné
    allCharacters.forEach(character => {
       
        console.log(character); // Inspectez la console pour voir les propriétés

        
        document.getElementById("characters-collection").innerHTML += `
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


// Liste des personnages à afficher
displayAllCharacters();
