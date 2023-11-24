<?php

namespace Madmax\Skrrr\controller\interfaces;
use Madmax\Skrrr\controller\interfaces\EtatCycle;

class CycleEnCours implements EtatCycle {
    public function EtatEnCours(): EtatCycle
    {
        echo 'je suis déjà en cours';
        return $this;
    }

    public function EtatTermine(): EtatCycle
    {
        echo 'je suis terminé';
        return new CycleTermine();
    }

    public function EtatNonDebute(): EtatCycle
    {
        echo 'je passe ne suis pas débuté';
        return new CycleNonDebute();
    }
}