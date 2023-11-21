<?php

namespace Madmax\Skrrr\forms;

use Madmax\Skrrr\app\model;

class FormProjet
{
    private $nom;
    private $description;

    public function __construct($nom, $description) {
        $this->nom = $nom;
        $this->description = $description;
    }

    public static function createForm($action, $mode = 'create', $id = 0)
    {
        if ($mode === 'update') {
            $livre = Model::getInstance()->getById('utilisateur', $id);
            return self::form($action);
        }
        return self::form($action);
    }

    public static function form($action)
    {
        $form = "<form action = $action method='POST'>
        <label for='nom'>Nom :</label>
        <input type='text' name='nom' required><br>
        <label for='prenom'>Prénom :</label>
        <input type='text' name='prenom' required><br>
        <label for='email'>Email :</label>
        <input type='email' name='email' required><br>
        <label for='mot_de_passe'>Mot de passe :</label>
        <input type='password' name='mot_de_passe' required><br>
        <input type='submit' value='inscription'>
            </form>";
        return $form;
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

