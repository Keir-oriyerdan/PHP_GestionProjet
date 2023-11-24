<?php

namespace Madmax\Skrrr\entity;

class Tache {
    private ?int $ID;
    private ?string $Titre;
    private ?string $Description;
    private ?int $Id_Priorite;
    private ?int $id;

    // Autres méthodes et propriétés

    /**
     * Get the value of Id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Affiche l'état de la tâche
     */
    public function afficherEtat() {
        // Vous pouvez implémenter la logique pour afficher l'état en fonction de l'ID
        switch ($this->id) {
            case 1:
                return "Non débuté";
            case 2:
                return "En cours";
            case 3:
                return "Terminé";
            default:
                return "État inconnu";
        }
    }

    // Autres méthodes et propriétés
}