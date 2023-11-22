<?php

echo '<a href=?controller=IndexController&method=index>Accueil</a><br>';

// affichage des différents projets
foreach ($projets as $key => $projet) {
    echo '<li>Projets: <a href=?controller=ProjetController&method=displayProjet&id='.$projet->getID().'>'.$projet->getNom().'</a> | <a href=?controller=ProjetController&method=updateProjet&id='.$projet->getID().'>Modifier</a> | <a href=?controller=ProjetController&method=supprimerProjet&id='.$projet->getID().'>Supprimer</a></li>';
}

?>

<a href="?controller=ProjetController&method=ProjetForm"><button type="button">Crée un Projet</button></a>