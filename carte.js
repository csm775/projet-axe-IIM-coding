async function fetchCharacterById(id) {
    const response = await fetch(`https://dragonball-api.com/api/characters/${id}`);
    if (!response.ok) {
        throw new Error("Erreur lors du chargement des données");
    }
    return response.json();
}

async function afficherDetails() {
    const params = new URLSearchParams(window.location.search);
    const id = params.get("id");
    const container = document.getElementById("carte-detail");

    if (!id) {
        container.innerText = "ID manquant dans l'URL";
        return;
    }

    try {
        const data = await fetchCharacterById(id);
        container.innerHTML = `
            <img src="${data.image}" alt="${data.name}" />
            <h2>${data.name}</h2>
            <p><strong>Race:</strong> ${data.race}</p>
            <p><strong>Genre:</strong> ${data.gender}</p>
            <p><strong>Affiliation:</strong> ${data.affiliation}</p>
            <p><strong>Ki:</strong> ${data.ki}</p>
            <p><strong>Max Ki:</strong> ${data.maxKi}</p>
        `;
    } catch (error) {
        container.innerText = "Personnage non trouvé ou erreur API.";
        console.error(error);
    }
}

afficherDetails();
