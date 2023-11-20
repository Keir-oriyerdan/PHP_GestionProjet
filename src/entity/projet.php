<?php

namespace Madmax\Skrrr\entity;

class Projet {
    private int $ID;
    private int $ID_Administrateur;

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
}