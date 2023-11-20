<?php

namespace Madmax\Skrrr\entity;

class Projet {
    private int $ID_Priorite;

    /**
     * Get the value of ID_Priorite
     */ 
    public function getID_Priorite()
    {
        return $this->ID_Priorite;
    }

    /**
     * Set the value of ID_Priorite
     *
     * @return  self
     */ 
    public function setID_Priorite($ID_Priorite)
    {
        $this->ID_Priorite = $ID_Priorite;

        return $this;
    }

    private int $ID_Admin;

    /**
     * Get the value of ID_Admin
     */ 
    public function getID_Admin()
    {
        return $this->ID_Admin;
    }

    /**
     * Set the value of ID_Admin
     *
     * @return  self
     */ 
    public function setID_Admin($ID_Admin)
    {
        $this->ID_Admin = $ID_Admin;

        return $this;
    }
}