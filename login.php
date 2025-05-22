<?php

require_once("connexion.php"); // Je récupère ma connexion à la base de données

session_start(); // Je démarre la session pour pouvoir utiliser $_SESSION

// Si un formulaire a été envoyé (POST), je vérifie si c’est pour se connecter
if($_POST) {
    $email = trim($_POST["email"]); // Je prends l’email envoyé par l’utilisateur
    $password = trim($_POST["password"]); // Je prends le mot de passe aussi

    if($email && $password) {
        // Je vérifie si un utilisateur existe avec cet email dans la base
        $stmt = $pdo->query("SELECT * FROM user WHERE email = '$email' ");
        $user = $stmt->fetch(PDO::FETCH_ASSOC); // Je récupère les infos de l'utilisateur trouvé

        // Si un utilisateur est trouvé et que le mot de passe correspond
        if($user && password_verify($password, $user["password"])) {
            // Je stocke les infos de l’utilisateur en session (il est connecté)
            $_SESSION["iduser"] = $user["id"];
            $_SESSION["email"] = $user["email"];
            header("Location: accueil.php"); // Je le redirige vers la page d’accueil
            echo "connexion réussie";
        } else {
            echo "La connexion a échoué !"; // Mauvais mot de passe ou mauvais mail
        }
    }
}

// Si je clique sur "Se déconnecter"
if(isset($_GET["action"]) && $_GET["action"] == "deconnexion") {
    // Je supprime les infos de session pour le déconnecter
    unset($_SESSION["iduser"]);
    unset($_SESSION["email"]);
    header("Location: login.php"); // Je le renvoie vers la page de login
    exit();
}

// Encore un test pour savoir si on reçoit un formulaire POST (pour inscription cette fois)
if($_POST) {
    $email = $_POST["email"]; // Je récupère l'email
    $password = $_POST["password"]; // Je récupère le mot de passe

    // Je prépare ma requête pour insérer un nouvel utilisateur
    $sql = "INSERT INTO user (email, password) VALUES(:email, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT) // Je sécurise le mot de passe
    ]);
    echo "Votre user a été correctement inséré en BDD"; // Message de confirmation
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Encodage des caractères -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Adapté aux mobiles -->
    <link rel="stylesheet" href="style.css"> <!-- Je mets du style externe -->
    <title>Connexion</title> <!-- Titre de l’onglet -->
</head>
<body id="login-page"> <!-- Corps de la page avec un id spécial -->

    <div id="login-container"> <!-- Conteneur principal -->

        <!-- Logo ajouté ici -->
        <div id="logo-container">
            <img src="images/IMG_1877-removebg-preview.png" alt="Logo connexion"> <!-- Image du logo -->
        </div>

        <h1>Connexion</h1> <!-- Titre principal -->

        <!-- Si l’utilisateur n’est pas connecté, je montre les formulaires -->
        <?php if(!isset($_SESSION["iduser"])) { ?>
        
            <!-- Formulaire de connexion -->
            <form method="POST">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" placeholder="Email">

                <label for="password">Mot de passe:</label>
                <input type="password" name="password" id="password" placeholder="Mot de passe">

                <input type="submit" value="Connexion"> <!-- Bouton pour se connecter -->
            </form>

            <h2>Inscription</h2> <!-- Titre pour le formulaire d’inscription -->

            <!-- Formulaire d’inscription -->
            <form method="POST">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" placeholder="Email">

                <label for="password">Mot de passe:</label>
                <input type="password" name="password" id="password" placeholder="Mot de passe">

                <input type="submit" value="Inscription"> <!-- Bouton pour s’inscrire -->
            </form>

        <?php } else { ?>
            <!-- Si l’utilisateur est déjà connecté, je montre juste le lien pour se déconnecter -->
            <a href="?action=deconnexion">Se déconnecter</a>
        <?php } ?>
    </div>
</body>
</html>

