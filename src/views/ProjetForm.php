<?php

echo '<a href=?controller=IndexController&method=index>Accueil</a><br>';
echo '<a href=?controller=ProjetController&method=displayProjets>Liste des projets</a><br>';

// affichage du formulaire pour créer des projets
echo $form;