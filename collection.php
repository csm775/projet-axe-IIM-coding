<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Document</title>
</head>
<body>
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
    <main>
        <!-- collection de cartes -->
        <section id="cartes">
            <input type="text" id="barre-recherche" value="" placeholder="Recherche" data-search="">
            <ul id="filtres">
                <li data-filter="all" class="active">All</li>
                <li data-filter="Z Fighter">Z Fighter</li>
                <li data-filter="Army of Frieza">Army of Frieza</li>
                <li data-filter="Freelancer">Freelancer</li>
                <li data-filter="Other">Other</li>
                <li data-filter="Villain">Villain</li>
                <li data-filter="Pride Troopers">Pride Troopers</li>
            </ul>
            <div class="filtres-container">
                <div id="characters-collection"></div>
            </div>
        </section>
    </main>
    <!-- Début du footer -->
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

        <!-- Bouton flottant -->
<button class="float-btn" id="float-btn">
    <i class="fas fa-exchange-alt"></i>
</button>

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
    <script src="recherche.js"></script>
    <script src="apicollection.js"></script>
    <script src="sidebar.js"></script>
    <script src="float.js"></script>
    <script src="auth.js"></script>
    <script src="favoris.js"></script>

</body>
</html>