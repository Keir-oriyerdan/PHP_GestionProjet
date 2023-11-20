<?php

namespace Madmax\Skrrr\entity;

class Projet {
    private int $ID;
    private int $ID_Admin;

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