<?php

use Madmax\Skrrr\controller\ProjetController;

echo '<a href=?controller=IndexController&method=index>Accueil</a><br>';
echo '<a href=?controller=ProjetController&method=displayProjets>Retour a la liste des projets</a><br><br>';

// Récupère les données de l'administrateur du projet
$datas = ProjetController::getAdmin();
// Affiche le nom du projet 
echo 'Nom du projet: '.$projet->getNom().'<br>';
// Affiche la description du projet
echo 'Description: '.$projet->getDescription().'<br>';
echo 'Administrateur: '.'<br>';
echo 'Participant: '.'<br>';
echo 'Tache: '.'<br>';
echo 'Prio de la tache: '.'<br>';
// Affiche le nom et le prénom de l'administrateur du projet à partir des données récupérées.
echo '(TEMPO)admin du proj: '.$datas[0]->Nom.' '.$datas[0]->Prenom.'<br>';