<?php

namespace Madmax\Skrrr\controller;

use Madmax\Skrrr\app\AbstractController;
use Madmax\Skrrr\controller\interfaces\CycleNonDebute;
use Madmax\Skrrr\controller\interfaces\EtatCycle;

class CycleController extends AbstractController {
    private EtatCycle $etatcycle;

    public function __construct()
    {
        parent::__construct();
        $this->etatcycle = new CycleNonDebute();
    }

    public function nonDebute()
    {
        $this->etatcycle = $this->etatcycle->EtatNonDebute();
    }

    public function enCours()
    {
        $this->etatcycle = $this->etatcycle->EtatEnCours();
    }

    public function terminer()
    {
        $this->etatcycle = $this->etatcycle->EtatTermine();
    }

    /**
     * Set the value of etatcycle
     *
     * @return  self
     */ 
    public function setEtatcycle($etatcycle)
    {
        $this->etatcycle = $etatcycle;

        return $this;
    }
}