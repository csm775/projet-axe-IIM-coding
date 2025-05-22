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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <script src="banniere.js"></script>
    <title>DBZ Cards</title>
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
            </div>


            <div class="hamburger">
                <img src="images/Hamburger_icon.svg.png" alt="">
            </div>
        </nav>
    </header>
    <main>
        <!-- bannière image d'acceuil -->
        <section id="bannière">
            <div class="photoaccueil">
                <img src="images/143566-3840x2160-desktop-4k-dragon-ball-z-wallpaper.jpg" alt="">
                <img src="images/dragon-ball-dragon-ball-chromebook-wallpaper.jpg" alt="">
                <img src="images/dragon-ball-dragon-ball-super-goku-wallpaper-preview.jpg" alt="">
                <img src="images/Fieza,+SSB+Vegeta+Goku.jpeg" alt="">
            </div>
            <div class="overlay-text">
                <h1>Echangez vos cartes avec les joueurs du monde entier</h1>
        </div>
        <!-- cartes du moment -->
        <section id="carte-dbz">
            <div id="cartes">   
                <h2>Les cartes du moment !</h2>
                 <div id="characters"></div>
                 <div class="see-collection">
                    <a href="collection.php" class="collection-btn">Voir toute la collection</a>
                </div>
            </div>
            <!-- booster -->
            <div id="booster">
                <h2>Les nouveaux boosters</h2>
                <img src="images/IMG_2007.jpeg" alt="Booster DBZ">
                <input type="button" value="Deballer" id="deballer">
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
<script src="banniere.js"></script>
<script src="slide.js"></script>
<script src="api.js"></script>
<script src="sidebar.js"></script>
<script src="float.js"></script>
<script src="booster.js"></script>
</body>
</html>