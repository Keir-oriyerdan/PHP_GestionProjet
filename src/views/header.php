<?php

namespace Madmax\Skrrr\app;

use Madmax\Skrrr\app\SecurityController;

?>
<header>
    <nav>
        <ul>
            <?php if (!SecurityController::isConnected()) : ?>
            <?php echo "Bienvenue sur le site !"?>
            <li><a href="?controller=UtilisateurController&method=displayUtilisateurs">Utilisateurs</a></li>
            <li><a href="?controller=ProjetController&method=displayProjets">Voir les projets</a></li>
            <li><a href="?controller=SecurityController&method=deconnexion">Déconnexion</a></li>
            <?php else : echo "Vous devez être connecté";?>
            <li><a href="?controller=UtilisateurController&method=ajoutUtilisateur">Créer un compte</a></li>
            <li><a href="?controller=UtilisateurController&method=ajoutUtilisateur">Connection</a></li>
            <?php endif; ?>
            
            
        </ul>
    </nav>
</header>