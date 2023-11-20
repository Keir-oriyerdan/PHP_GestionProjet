<?php

namespace Madmax\Skrrr\entity;

class Administrateur{
    private ?int $ID;
    private ?int $ID_Utilisateur;

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
     * Get the value of ID_Utilisateur
     */ 
    public function getID_Utilisateur()
    {
        return $this->ID_Utilisateur;
    }

    /**
     * Set the value of ID_Utilisateur
     *
     * @return  self
     */ 
    public function setID_Utilisateur($ID_Utilisateur)
    {
        $this->ID_Utilisateur = $ID_Utilisateur;

        return $this;
    }
}