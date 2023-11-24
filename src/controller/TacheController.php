<?php 
//faire en sorte que sur les taches on puisse asigner des etats qu'on retrouvera dans cycle controller
namespace Madmax\Skrrr\controller;

use Madmax\Skrrr\app\AbstractController;
use Madmax\Skrrr\controller\interfaces\EtatCycle;
use Madmax\Skrrr\controller\interfaces\CycleNonDebute;
use Madmax\Skrrr\app\Model;

class TacheController extends AbstractController {
    
    public static function displayTache()
    {
        return Model::getInstance()->getTache();
    }
}