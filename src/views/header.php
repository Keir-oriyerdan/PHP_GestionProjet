<?php

namespace Madmax\Skrrr\app;

use Madmax\Skrrr\app\SecurityController;

?>
<header>
    <nav>
        <img src="./img/logo.png" alt="">
        <ul>
        
        <!-- Condition qui Vérifie si l'utilisateur est connecté -->
        <?php if (SecurityController::isConnected()) : ?>
            <li><a href="?controller=UtilisateurController&method=displayUtilisateurs">Utilisateurs</a></li>
            <li><a href="?controller=ProjetController&method=displayProjets">Voir les projets</a></li>
            <li><a href="?controller=ConnexionController&method=deconnexion">Déconnexion</a></li>
            <!-- Sinon, si l'utilisateur n'est pas connecté, message d'erreur -->
            <?php else : echo "Vous devez être connecté";?>
            <li><a href="?controller=UtilisateurController&method=ajoutUtilisateur">Créer un compte</a></li>
            <li><a href="?controller=ConnexionController&method=connect">Connexion</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>