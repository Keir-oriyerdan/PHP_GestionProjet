<?php

namespace Madmax\Skrrr\entity;

class Cycle_de_vie {
    private int $ID;
    private string $Etat;

    /**
     * Get the value of Etat
     */ 
    public function getEtat()
    {
        return $this->Etat;
    }

    /**
     * Set the value of Etat
     *
     * @return  self
     */ 
    public function setEtat($Etat)
    {
        $this->Etat = $Etat;

        return $this;
    }

    /**
     * Get the value of ID
     */ 
    public function getID()
    {
        return $this->ID;
    }

    /**
     * Set the value of ID
     *
     * @return  self
     */ 
    public function setID($ID)
    {
        $this->ID = $ID;

        return $this;
    }
}