<?php

echo '<a href=http://localhost/PHP_GestionProjet/>Accueil</a><br>';

// affichage des différents projets
foreach ($projets as $key => $projet) {
    echo '<li>Projets: <a href=http://localhost/PHP_GestionProjet/?controller=ProjetController&method=displayProjet&id='.$projet->getID().'>'.$projet->getNom().' description: '.$projet->getDescription().'</a></li><br>';
}

?>

<a href="http://localhost/PHP_GestionProjet/?controller=ProjetController&method=ProjetForm"><button type="button">Crée un Projet</button></a>