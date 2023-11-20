<?php

namespace Madmax\Skrrr\entity;

class tache {
    private ?int $ID_Tache;
    private ?string $Titre;
    private ?string $Description;
    private ?int $Id_Priorite;
    private ?int $ID_Cycle;
    private ?int $ID_Utilisateur;
    private ?int $ID_Projet;

    /**
     * Get the value of ID_Tache
     */ 
    public function getID_Tache()
    {
        return $this->ID_Tache;
    }

    /**
     * Set the value of ID_Tache
     *
     * @return  self
     */ 
    public function setID_Tache($ID_Tache)
    {
        $this->ID_Tache = $ID_Tache;

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

    /**
     * Get the value of ID_Cycle
     */ 
    public function getID_Cycle()
    {
        return $this->ID_Cycle;
    }

    /**
     * Set the value of ID_Cycle
     *
     * @return  self
     */ 
    public function setID_Cycle($ID_Cycle)
    {
        $this->ID_Cycle = $ID_Cycle;

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
}