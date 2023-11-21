<?php

namespace Madmax\Skrrr\forms;

use Madmax\Skrrr\app\model;

class FormProjet
{
    private $id;
    private $id_administrateur;
    private $nom;
    private $description;

    public function __construct($nom, $description) {
        $this->nom = $nom;
        $this->description = $description;
    }

    public static function createForm($action, $mode = 'create', $id = 0)
    {
        if ($mode === 'update') {
            $livre = Model::getInstance()->getById('projet', $id);
            return self::form($action);
        }
        return self::form($action);
    }

    public static function form($action)
    {
        $form = "<form action = $action method='POST'>
        <label for='nom'>Nom :</label>
        <input type='text' name='nom' required><br>

        <label for='text'>Description: </label>
        <input type='text' name='description' required><br>
        
        <button type='submit' name='submit'>Créer</button>
            </form>";
        return $form;
    }


    public function enregistrerProjet() {
        echo "Le projet {$this->nom} a été crée !";
    }

    public function validerProjet() {
        $error = [];

        if (empty($_POST['nom']) || empty($_POST['description'])) {
            $error[] = 'Veuillez compléter tous les champs.';
        }

        if (count($error) > 0) {
            return $error;
        }

        return true;
    }

    public function updateProjet() 
    {

    }

    public function deleteProjet() 
    {

    }
}

/* if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
 */

