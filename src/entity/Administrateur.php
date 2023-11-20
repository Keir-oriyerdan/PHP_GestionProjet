<?php

namespace Madmax\Skrrr\entity;

class Administrateur{
    private int $id_Admin;

    /**
     * Get the value of id_Admin
     */ 
    public function getId_Admin()
    {
        return $this->id_Admin;
    }

    /**
     * Set the value of id_Admin
     *
     * @return  self
     */ 
    public function setId_Admin($id_Admin)
    {
        $this->id_Admin = $id_Admin;

        return $this;
    }
}