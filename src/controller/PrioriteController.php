<?php

namespace Madmax\Skrrr\controller;

use Madmax\Skrrr\app\AbstractController;
use Madmax\Skrrr\app\Model;

class PrioriteController extends AbstractController {

    public function displayPriorite()
    {
        Model::getInstance()->getById('priorite', $_GET['id']);
    }

    
}