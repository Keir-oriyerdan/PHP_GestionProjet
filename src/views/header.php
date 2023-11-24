<?php

namespace Madmax\Skrrr\app;

use Madmax\Skrrr\app\SecurityController;

?>
<header>
    <nav>
        <img src="./img/logo.png" alt="">
        <ul>
        <li><a href="?controller=EmpruntController&method=displayEmprunts">Emprunts</a></li>
        <?php if (SecurityController::isConnected()) : ?>
            <li><a href="?controller=UtilisateurController&method=ajoutUtilisateur">Ajouter utilisateur</a></li>
            <li><a href="?controller=UtilisateurController&method=displayUtilisateurs">Utilisateurs</a></li>
            <li><a href="?controller=ProjetController&method=displayProjets">Voir les projets</a></li>
            <li><a href="?controller=ConnexionController&method=deconnexion">Déconnexion</a></li>
            <?php else : echo "Vous devez être connecté";?>
            <li><a href="?controller=UtilisateurController&method=ajoutUtilisateur">Créer un compte</a></li>
            <li><a href="?controller=ConnexionController&method=connect">Connexion</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>