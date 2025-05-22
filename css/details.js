// detail.js
const params = new URLSearchParams(window.location.search);
const characterId = params.get("id");

if (characterId) {
    fetch(`https://dragonball-api.com/api/characters/${characterId}`)
        .then(response => response.json())
        .then(character => {
            const container = document.getElementById("character-detail");

            container.innerHTML = `
                <div class="character-carte">
                    <h2>${character.name}</h2>
                    <img src="${character.image}" alt="${character.name}">
                    <p><strong>Race :</strong> ${character.race}</p>
                    <p><strong>Genre :</strong> ${character.gender}</p>
                    <p><strong>Ki :</strong> ${character.ki}</p>
                    <p><strong>Max Ki :</strong> ${character.maxKi}</p>
                    <p><strong>Affiliation :</strong> ${character.affiliation}</p>
                </div>
            `;
        })
        .catch(error => {
            console.error("Erreur de récupération :", error);
        });
} else {
    document.getElementById("character-detail").textContent = "Aucun ID trouvé dans l'URL.";
}
