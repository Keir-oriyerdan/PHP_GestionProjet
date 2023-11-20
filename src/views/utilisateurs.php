<?php

echo '<a href=?controller=IndexController&method=index>Accueil</a><br><br>';

foreach ($utilisateurs as $key => $utilisateur) {
    echo '<li><a href=?controller=UtilisateurController&method=displayUtilisateur&idUtilisateur='.$utilisateur->getID().'>'.$utilisateur->getNom().' '.$utilisateur->getPrenom().'</a></li>';
}