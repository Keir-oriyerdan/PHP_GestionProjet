<?php

echo '<a href=http://localhost/PHP_GestionProjet/>Accueil</a><br>';

// affichage des différents projets
foreach ($projets as $key => $projets) {
    echo 'Projets: <a href=http://localhost/PHP_GestionProjet/?controller=ProjetController&method=displayProjet&id='.$projets->getID().'></a><br>';
}

?>

<a href="http://localhost/PHP_GestionProjet/?controller=ProjetController&method=ProjetForm"><button type="button">Crée un Projet</button></a>