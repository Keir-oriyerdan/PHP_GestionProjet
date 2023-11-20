<?php 

class Priorite {
    private int $Id_Priorite;

    /**
     * Get the value of Id_Priorite
     */ 
    public function getId_Priorite()
    {
        return $this->Id_Priorite;
    }

    /**
     * Set the value of Id_Priorite
     *
     * @return  self
     */ 
    public function setId_Priorite($Id_Priorite)
    {
        $this->Id_Priorite = $Id_Priorite;

        return $this;
    }

    private ?string $Niveau_Priorite;

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