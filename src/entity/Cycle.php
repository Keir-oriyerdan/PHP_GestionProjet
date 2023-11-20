<?php

namespace Madmax\Skrrr\entity;

class Cycle {
    private int $id_Cycle;
    private string $Etat;

    /**
     * Get the value of id_Cycle
     */ 
    public function getId_Cycle()
    {
        return $this->id_Cycle;
    }

    /**
     * Set the value of id_Cycle
     *
     * @return  self
     */ 
    public function setId_Cycle($id_Cycle)
    {
        $this->id_Cycle = $id_Cycle;

        return $this;
    }

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
}