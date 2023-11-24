<?php

use Madmax\Skrrr\controller\ProjetController;
use Madmax\Skrrr\controller\TacheController;
use Madmax\Skrrr\controller\PrioriteController;

echo '<a href=?controller=IndexController&method=index>Accueil</a><br>';
echo '<a href=?controller=ProjetController&method=displayProjets>Retour a la liste des projets</a><br><br>';

// $datasU = ProjetController::getUsers();
$datasT = TacheController::displayTache();
$datasP = PrioriteController::displayPrio();

// Récupère les données de l'administrateur du projet
$datas = ProjetController::getAdmin();
// Affiche le nom du projet 
echo 'Nom du projet: '.$projet->getNom().'<br>';
// Affiche la description du projet
echo 'Description: '.$projet->getDescription().'<br>';
echo 'Administrateur: '.$datas[0]->Nom.' '.$datas[0]->Prenom.'<br>';
echo 'Participant: '.'<br>';

foreach ($datasT as $key => $tache) {
    if ($key === 0) {
        echo 'Taches: '.$datasT[$key]->getTitre().'<br>';  
    } else {
        echo $datasT[$key]->getTitre().'<br>';  
    }
     
}

echo 'Priorité de la tache: '.$datasP[0]->Niveau_Priorite.'<br>';