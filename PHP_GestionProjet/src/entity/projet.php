<?php

namespace Madmax\Skrrr\entity;

class Projet {
    private int $ID;
    private int $ID_Administrateur;
    private ?string $Nom;
    private ?string $Description;

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
     * Get the value of ID_Administrateur
     */ 
    public function getID_Administrateur()
    {
        return $this->ID_Administrateur;
    }

    /**
     * Set the value of ID_Administrateur
     *
     * @return  self
     */ 
    public function setID_Administrateur($ID_Administrateur)
    {
        $this->ID_Administrateur = $ID_Administrateur;

        return $this;
    }

    /**
     * Get the value of Nom
     */ 
    public function getNom()
    {
        return $this->Nom;
    }

    /**
     * Set the value of Nom
     *
     * @return  self
     */ 
    public function setNom($Nom)
    {
        $this->Nom = $Nom;

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
}