<?php

namespace Madmax\Skrrr\UtilisateurController;

use Madmax\Skrrr\app\Model;

class FormUtilisateur
{
    private $id;
    private $id_utilisateur;
    private $nom;
    private $prenom;
    private $email;
    private $motDePasse;

    public function __construct($nom, $prenom, $email, $motDePasse)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->motDePasse = $motDePasse;
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



    public function enregistrerUtilisateur()
    {
        echo "L'utilisateur {$this->prenom} {$this->nom} a été enregistré !";
    }

    public function validerInscription()
    {
        $error = [];

        if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['mot_de_passe'])) {
            $error[] = 'Veuillez compléter tous les champs.';
        }

        if (isset($_POST['username']) && strlen($_POST['username']) < 5) {
            $error[] = 'Le nom d\'utilisateur doit comporter 5 caractères minimum';
        }

        if (isset($_POST['password'])) {
            $password = $_POST['password'];

            if (strlen($password) < 5) {
                $error[] = 'Le mot de passe doit comporter 5 caractères minimum';
            }

            if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
                $error[] = 'Le mot de passe doit contenir au moins un caractère spécial';
            }
        }

        if (isset($_POST['password']) && isset($_POST['passwordverify']) && ($_POST['password'] !== $_POST['passwordverify'])) {
            $error[] = 'Les mots de passe doivent être identiques';
        }

        if (count($error) > 0) {
            return $error;
        }

        return true;
    }

    public function updateUtilisateur() {

    }

    public function deleteUtilisateur() {

    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['mot_de_passe'])) {
        echo 'Veuillez compléter tous les champs.';
    } else {
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $email = $_POST["email"];
        $motDePasse = $_POST["mot_de_passe"];

        $utilisateur = new FormUtilisateur($nom, $prenom, $email, $motDePasse);

        $validationResult = $utilisateur->validerInscription();

        if ($validationResult === true) {
            $utilisateur->enregistrerUtilisateur();
        } else {
            foreach ($validationResult as $erreur) {
                echo "Erreur: $erreur <br>";
            }
        }
    }
}


    

