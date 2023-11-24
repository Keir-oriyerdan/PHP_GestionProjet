<?php

use Madmax\Skrrr\controller\ProjetController;
use Madmax\Skrrr\controller\TacheController;
use Madmax\Skrrr\controller\PrioriteController;

echo '<a href=?controller=IndexController&method=index>Accueil</a><br>';
echo '<a href=?controller=ProjetController&method=displayProjets>Retour a la liste des projets</a><br><br>';

// Récupère les données de l'administrateur du projet
$datas = ProjetController::getAdmin();
$datasU = ProjetController::getUsers();
// Affiche le nom du projet 
echo 'Nom du projet: '.$projet->getNom().'<br>';
// Affiche la description du projet
echo 'Description: '.$projet->getDescription().'<br>';
echo 'Administrateur: '.$datas[0]->Nom.' '.$datas[0]->Prenom.'<br>';
echo 'Participant: '.$datasU[0]->Nom.' '.$datasU[0]->Prenom.'<br>';
echo 'Tache: '.$projet->displayTache().'<br>';  
echo 'Prio de la tache: '.$projet->displayPriorite().'<br>';