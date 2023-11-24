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

    // créa du formulaire pour créer un projet en fonction du mode
    public static function createForm($action, $mode = 'create', $id = 0)
    {
        // Si mode update on récupére les données du projet et on retourne le formulaire de mise à jour.
        if ($mode === 'update') {
            Model::getInstance()->getById('projet', $id);
            return self::formUpdate($action);
        }
        // Sinon on retourner le form de créa
        return self::form($action);
    }

    // formulaire pour créer un projet
    public static function form($action)
    {
        $form = "<form action = $action method='POST'>
        <label for='nom'>Nom :</label>
        <input type='text' name='nom' required><br>

        <label for='description'>Description: </label>
        <input type='text' name='description' required><br>
        
        <button type='submit' name='submit'>Créer</button>
            </form>";
        return $form;
    }

    // formulaire pour update un projet 
    public static function formUpdate($action)
    {
        $form = "<form action = $action method='POST'>
        <label for='nom'>Changer de nom: </label>
        <input type='text' name='nom' required><br>

        <label for='description'>Changer de description: </label>
        <input type='text' name='description' required><br>

        <button type='submit' name='submit'>Modifier</button>
            </form>";
        return $form;
    }

    //message de succès d'enregistrement de projet
    public function enregistrerProjet() {
        echo "Le projet {$this->nom} a été crée !";
    }
    //Valider les données du projet
    public function validerProjet() {
        $error = [];
        // Vérification des champs obligatoires
        if (empty($_POST['nom']) || empty($_POST['description'])) {
            $error[] = 'Veuillez compléter tous les champs.';
        }
        // Retourne les erreurs s'il y en a, sinon retourne true
        if (count($error) > 0) {
            return $error;
        }

        return true;
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

