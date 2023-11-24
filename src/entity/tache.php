<?php

namespace Madmax\Skrrr\entity;

class Tache {
    private ?int $ID;
    private ?string $Titre;
    private ?string $Description;
    private ?int $Id_Priorite;

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
     * Get the value of Titre
     */ 
    public function getTitre()
    {
        return $this->Titre;
    }

    /**
     * Set the value of Titre
     *
     * @return  self
     */ 
    public function setTitre($Titre)
    {
        $this->Titre = $Titre;

        return $this;
    }

    /**
     * Get the value of Description
     */ 
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * Set the value of Description
     *
     * @return  self
     */ 
    public function setDescription($Description)
    {
        $this->Description = $Description;

        return $this;
    }

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
}