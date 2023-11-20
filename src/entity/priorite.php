<?php 

namespace Madmax\Skrrr\entity;

class Priorite {
    private int $ID;
    private ?string $Niveau_Priorite;
    
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
    
    /**
     * Get the value of Niveau_Priorite
     */ 
    public function getNiveau_Priorite()
    {
        return $this->Niveau_Priorite;
    }
    
    /**
     * Set the value of Niveau_Priorite
     *
     * @return  self
     */ 
    public function setNiveau_Priorite($Niveau_Priorite)
    {
        $this->Niveau_Priorite = $Niveau_Priorite;

        return $this;
    }
}