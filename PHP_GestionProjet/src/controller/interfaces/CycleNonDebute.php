<?php

namespace Madmax\Skrrr\controller\interfaces;
use Madmax\Skrrr\controller\interfaces\EtatCycle;

class CycleNonDebute implements EtatCycle {
    public function EtatEnCours(): EtatCycle
    {
        echo 'je passe en cours';
        return new CycleEnCours();
    }

    public function EtatTermine(): EtatCycle
    {
        echo 'je suis terminé';
        return new CycleTermine();
    }

    public function EtatNonDebute(): EtatCycle
    {
        echo 'était déjà non débuté';
        return $this;
    }
}