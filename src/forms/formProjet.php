<?php

namespace Madmax\Skrrr\UtilisateurController;

use Madmax\Skrrr\app\Model;

class FormProjet
{
    private $nom;
    private $description;

    public function __construct($nom, $description) {
        $this->nom = $nom;
        $this->description = $description;
    }

    public function enregistrerFormProjet() {
        echo "Le projet {$this->nom} a été crée !";
    }

    public function validerFormProjet() {
        $error = [];

        if (empty($_POST['nom']) || empty($_POST['description'])) {
            $error[] = 'Veuillez compléter tous les champs.';
        }

        if (count($error) > 0) {
            return $error;
        }

        return true;
    }

    public function updateFormProjet() {
    }

    public function deleteFormProjet() {
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['nom']) || empty($_POST['description'])) {
        echo 'Veuillez compléter tous les champs.';
    } else {
        $nom = $_POST["nom"];
        $description = $_POST["description"];

        $projet = new FormProjet($nom, $description);

        $validationResult = $projet->validerFormProjet();

        if ($validationResult === true) {
            $projet->enregistrerFormProjet();
        } else {
            foreach ($validationResult as $erreur) {
                echo "Erreur: $erreur <br>";
            }
        }
    }
}

