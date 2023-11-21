<?php

echo '<a href=http://localhost/PHP_GestionProjet/>Accueil</a><br>';
echo '<a href=http://localhost/PHP_GestionProjet/?controller=ProjetController&method=displayProjets>Retour a la liste des projets</a><br><br>';

echo 'Nom du projet: '.$projet->getNom().'<br>';
echo 'Description: '.$projet->getDescription().'<br>';
echo 'Administrateur: '.'<br>';
echo 'Participant: '.'<br>';