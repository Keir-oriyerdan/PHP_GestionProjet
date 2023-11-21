<?php

namespace Madmax\Skrrr\controller\interfaces;

interface EtatCycle {
    public function EtatNonDebute():EtatCycle;
    public function EtatEnCours():EtatCycle;
    public function EtatTermine():EtatCycle;
}