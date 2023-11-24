<?php

// Affiche un lien vers la page d'accueil.
echo '<a href=?controller=IndexController&method=index>Accueil</a><br>';
// Affiche un lien vers la page qui affiche la liste des utilisateurs.
echo '<a href=?controller=UtilisateurController&method=displayUtilisateurs>Liste des utilisateurs</a><br><br>';
// Affiche le nom de l'utilisateur
echo 'Nom : '.$utilisateur->getNom().'<br>';
// Affiche le prénom de l'utilisateur
echo 'Prénom : '.$utilisateur->getPrenom().'<br>';