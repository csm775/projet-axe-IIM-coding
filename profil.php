<?php
session_start();

// Si des cartes sont envoyées en POST (JSON), on les stocke en session
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    if (isset($data['cards']) && is_array($data['cards'])) {
        $_SESSION['opened_booster_cards'] = $data['cards'];
        // Fin de script pour éviter que la page HTML complète ne s'affiche lors du POST
        http_response_code(200);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil DBZ</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="profil-page">
    <!-- Début du header -->
    <header>
        <nav>
            <div class="nav-links">
                <ul class="menu">
                    <li><a href="accueil.php">Accueil</a></li>
                    <li><a href="collection.php">Collection</a></li>
                    <li><a href="profil.php">Profil</a></li>
                </ul>
            </div>
            <div class="logo">
                <img src="images/IMG_1877-removebg-preview.png" alt="Logo du site">
            </div>
            <div class="darkmodecustom">
                <div class="dark-mode">
                    <button class="darkmode-btn" onclick="toggleDarkMode()">Dark Mode</button>
                </div>
            </div>
            <div id="content">
            <?php if (isset($_SESSION["email"])) { ?>
                <a href="login.php?action=deconnexion"><button>Se déconnecter</button></a>
            <?php } else { ?>
             <a href="inscription.php"><button>Se connecter / S'inscrire</button></a>
            <?php } ?>
            <div class="hamburger">
                <img src="images/Hamburger_icon.svg.png" alt="">
            </div>
        </nav>
    </header>

    <main class="profil-container">
        <section class="user-info-section">
            <div class="user-avatar">
                <img src="images/187711.png" alt="Avatar" id="user-avatar-img">
            </div>
            <div class="user-details">
                <h1 id="username">Nom Utilisateur</h1>
                <div class="user-stats">
                    <div class="stat">
                        <span class="stat-value" id="total-cards">
                            <?php 
                            // Affiche le nombre de cartes dans la collection
                            echo isset($_SESSION["opened_booster_cards"]) ? count($_SESSION["opened_booster_cards"]) : "0";
                            ?>
                        </span>
                        <span class="stat-label">Cartes</span>
                    </div>
                </div>
                <div class="user-meta">
                    <p><i class="fas fa-envelope"></i> <span id="user-email"><?php echo $_SESSION["email"]; ?></span></p>
                    <p><i class="fas fa-calendar-alt"></i> Membre depuis <span id="join-date">01/01/2023</span></p>
                </div>
            </div>
        </section>

        <section class="collection-section">
            <h2><i class="fas fa-book"></i> Ma Collection</h2>
            <div class="collection-filters">
                <input type="text" id="collection-search" placeholder="Rechercher dans ma collection...">
                <select id="collection-sort">
                    <option value="recent">Récentes</option>
                    <option value="power">Puissance</option>
                    <option value="name">Nom (A-Z)</option>
                </select>
            </div>
    <div class="collection-grid" id="collection-grid">
    <?php
    if (isset($_SESSION['opened_booster_cards']) && is_array($_SESSION['opened_booster_cards'])) {
    foreach ($_SESSION['opened_booster_cards'] as $card) {
        echo '<div class="card">';
        echo '<img src="' . htmlspecialchars($card['image']) . '" alt="' . htmlspecialchars($card['name']) . '" style="width:100%; height:auto;">';
        echo '<h3>' . htmlspecialchars($card['name']) . '</h3>';
        echo '<p>Race : ' . htmlspecialchars($card['race'] ?? 'Inconnue') . '</p>';
        echo '<p>Puissance : ' . htmlspecialchars($card['ki'] ?? 'N/A') . '</p>';
        echo '</div>';
    }
    } else {
    echo "<p>Vous n'avez pas encore de cartes dans votre collection.</p>";
    }
    ?>
</div>

<!-- Modal d'échange -->
<div class="exchange-modal" id="exchange-modal">
    <div class="modal-content">
        <span class="close-modal">&times;</span>
        <h2>Échange de Cartes</h2>
        
        <form id="exchange-form">
            <div class="form-group">
                <label for="receiver">Joueur :</label>
                <select id="receiver" required>
                    <option value="">Choisir un joueur...</option>
                    <option value="user1">Joueur 1</option>
                     <option value="user2">Joueur 2</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="card-to-give">Carte à échanger :</label>
                <select id="card-to-give" required>
                    <option value="">Choisir une carte...</option>
                    <option value="card1">Vegeta</option>
                    <option value="card2">Goku</option>
                    <option value="card1">Gohan</option>
                    <option value="card1">Piccolo</option>
                </select>
            </div>
            
            <button type="submit" class="submit-btn">Proposer l'échange</button>
        </form>
    </div>
</div>

        </section>
    </main>

    <footer class="dbz-footer">
        <div class="footer-content">
            <div class="footer-logo">
                <img src="images/IMG_1877-removebg-preview.png" alt="DBZ Cards Logo">
                <p>La référence des collectionneurs de cartes Dragon Ball</p>
            </div>
            
            <div class="footer-links">
                <h3>Navigation</h3>
                <ul>
                    <li><a href="accueil.php">Accueil</a></li>
                    <li><a href="collection.php">Collection</a></li>
                    <li><a href="profil.php">Profil</a></li>
                </ul>
            </div>
            
            <div class="footer-contact">
                <h3>Contactez-nous</h3>
                <ul>
                    <li><i class="fas fa-envelope"></i> contact@dbzcards.com</li>
                    <li><i class="fas fa-phone"></i> +33 1 23 45 67 89</li>
                    <li><i class="fas fa-map-marker-alt"></i> 12 Rue des Saïyans, 75000 Paris</li>
                </ul>
            </div>
            
            <div class="footer-social">
                <h3>Nos réseaux</h3>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-discord"></i></a>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>© 2023 DBZ Cards Collection. Tous droits réservés.</p>
            <a href="#">Mentions légales</a> | 
            <a href="#">Politique de confidentialité</a> | 
            <a href="#">Conditions d'utilisation</a>
        </div>
    </footer>
    <script src="booster.js"></script>
    <script src="sidebar.js"></script>
    <script src="float.js"></script>
</body>
</html>
