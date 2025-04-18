function utilisateur(email, password) {
    localStorage.setItem('user', JSON.stringify({ email, password })); // création de la fonction qui récupére le mail et mot de passe
}


// création de la fonction de connexion
function connexion() {
    return localStorage.getItem('loggedIn') === 'true';
}

function getUser() {
    return JSON.parse(localStorage.getItem('user'));
}

// création de la fonction de connexion si le mail et mot de passe correspondent, redirection vers la pages html accueil
function login(email, password) {
    let user = getUser();
    if (user && user.email === email && user.password === password) {
        localStorage.setItem('loggedIn', 'true');
        window.location.href = 'accueil.html';
    } else {
        alert('Email ou mot de passe incorrect');
    }
}
// création de la fonction de déconnexion
function deconexion() {
    let user = getUser();
    if (user) {
        localStorage.setItem('lastEmail', user.email);
    }
    localStorage.setItem('loggedIn', 'false');
}


document.addEventListener('DOMContentLoaded', function () {
      // Récupération des éléments du formulaire
    let loginForm = document.getElementById('login-form');
    let registerForm = document.getElementById('register-form');
    let emailField = document.getElementById('login-email');
    let storedEmail = localStorage.getItem('lastEmail');
    // Si un email est trouvé dans le stockage local, on le pré-remplit dans le champ email
    if (storedEmail) {
        emailField.value = storedEmail;
    }

     // Gestion de la soumission du formulaire de connexion
    loginForm.addEventListener('submit', function (e) {
        e.preventDefault();
        let email = emailField.value;
        let password = document.getElementById('login-password').value;
        // Appel de la fonction de connexion avec les identifiants
        login(email, password);
    });

    
    // Gestion de la soumission du formulaire d'inscription
    registerForm.addEventListener('submit', function (e) {
        e.preventDefault();
        let email = document.getElementById('register-email').value;
        let password = document.getElementById('register-password').value;
         // Appel de la fonction d'enregistrement
        utilisateur(email, password);
        alert('Inscription réussie');
    });

});

// Gestion du bouton de déconnexion
document.getElementById('logout-button').addEventListener('click', function () {
    deconexion();
    window.location.href = 'login.html';
});