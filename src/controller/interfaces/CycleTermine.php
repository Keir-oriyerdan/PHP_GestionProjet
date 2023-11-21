<?php

namespace Madmax\Skrrr\controller\interfaces;
use Madmax\Skrrr\controller\interfaces\EtatCycle;

class CycleTermine implements EtatCycle {
    public function EtatEnCours(): EtatCycle
    {
        echo 'je passe en cours';
        return new CycleEnCours();
    }

    public function EtatTermine(): EtatCycle
    {
        echo 'je suis déjà terminé';
        return $this;
    }

    public function EtatNonDebute(): EtatCycle
    {
        echo 'je passe en non débuté';
        return new CycleNonDebute();
    }
}