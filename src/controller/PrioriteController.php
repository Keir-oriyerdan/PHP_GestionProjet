<?php

namespace Madmax\Skrrr\controller;

use Madmax\Skrrr\app\AbstractController;
use Madmax\Skrrr\app\Model;

class PrioriteController extends AbstractController
{
    // Fonction pour afficher les niveaux de priorité
    public function displayPriorite()
    {
        // Appeler la fonction pour récupérer des données liées aux niveaux de priorité et aux tâches
        Model::getInstance()->getDataFromEntity(
            [
                'priorite.Niveau_Priorite',
            ],
                'priorite',
            [
                'tache',
            ]
        );
    }
    
}
