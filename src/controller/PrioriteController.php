<?php

namespace Madmax\Skrrr\controller;

use Madmax\Skrrr\app\AbstractController;
use Madmax\Skrrr\app\Model;

class PrioriteController extends AbstractController
{

    public function displayPriorite()
    {
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
