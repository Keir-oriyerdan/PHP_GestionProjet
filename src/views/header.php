<?php

namespace Madmax\Skrrr\app;

use Madmax\Skrrr\app\SecurityController;

?>
<header>
    <nav>
        <ul>
        <?php if (SecurityController::isConnected()) : ?>
            <?php echo "Bienvenue sur le site !"?>
            <li><a href="?controller=SecurityController&method=deconnexion">Déconnexion</a></li>
            <?php else : echo "Vous devez être connecté";?>
            <?php endif; ?>
            <li><a href="?controller=UtilisateurController&method=ajoutUtilisateur">Ajouter utilisateur</a></li>
            <li><a href="?controller=UtilisateurController&method=displayUtilisateurs">Utilisateurs</a></li>
            <li><a href="?controller=ProjetController&method=displayProjets">Voir les projets</a></li>
           
            <li><a href="?controller=EmpruntController&method=displayEmprunts">Emprunts</a></li>
        </ul>
    </nav>
</header>
<?php

?>