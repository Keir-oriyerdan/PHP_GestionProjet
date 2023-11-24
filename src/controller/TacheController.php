<?php 
//faire en sorte que sur les taches on puisse asigner des etats qu'on retrouvera dans cycle controller
namespace Madmax\Skrrr\controller;

use Madmax\Skrrr\app\AbstractController;
use Madmax\Skrrr\controller\interfaces\EtatCycle;
use Madmax\Skrrr\controller\interfaces\CycleNonDebute;
use Madmax\Skrrr\app\Model;

class TacheController extends AbstractController {

    private EtatCycle $etattache;

    public function __construct()
    {
        $this->etattache = new CycleNonDebute();
    }

    public function EtatTache()
    {
        $this->etattache = $this->etattache->EtatNonDebute();
    } 

    public function displayPrioTache()
    {
        $result = Model::getInstance()->getById('priorite', $_GET['id']);
        $this->render('projet.php', ['projet' => $result]);
    }
}