<?php

echo '<a href=?controller=UtilisateurController&method=displayUtilisateurs>Liste des utilisateurs</a><br><br>';

echo 'Nom : '.$utilisateur->getNom().'<br>';
echo 'Prénom : '.$utilisateur->getPrenom().'<br>';