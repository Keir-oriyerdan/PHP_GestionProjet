<?php

use Madmax\Skrrr\controller\ProjetController;

echo '<a href=?controller=IndexController&method=index>Accueil</a><br>';
echo '<a href=?controller=ProjetController&method=displayProjets>Retour a la liste des projets</a><br><br>';

$datas = ProjetController::getAdmin();
echo 'Nom du projet: '.$projet->getNom().'<br>';
echo 'Description: '.$projet->getDescription().'<br>';
echo 'Administrateur: '.'<br>';
echo 'Participant: '.'<br>';
echo 'Tache: '.'<br>';  
echo 'Prio de la tache: '.$projet->displayPrioTache().'<br>';
echo '(TEMPO)admin du proj: '.$datas[0]->Nom.' '.$datas[0]->Prenom.'<br>';