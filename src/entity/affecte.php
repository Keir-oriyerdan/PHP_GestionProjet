<?php

class Affecte {
    private int $ID_Projet;

    /**
     * Get the value of ID_Projet
     */ 
    public function getID_Projet()
    {
        return $this->ID_Projet;
    }

    /**
     * Set the value of ID_Projet
     *
     * @return  self
     */ 
    public function setID_Projet($ID_Projet)
    {
        $this->ID_Projet = $ID_Projet;

        return $this;
    }

    private int $ID_Utilisateur;

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