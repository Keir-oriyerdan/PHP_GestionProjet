<?php

namespace Madmax\Skrrr\forms;

use Madmax\Skrrr\app\model;

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
            Model::getInstance()->getById('utilisateur', $id);
            return self::formUpdate($action);
        }
        return self::form($action);
    }

    public static function form($action)
    {
        $form = "<form action = $action method='POST' class='forminscription'>
        <label for='nom'>Nom :</label>
        <input type='text' name='nom' required placeholder='Nom'><br>
        <label for='prenom'>Prénom :</label>
        <input type='text' name='prenom' required placeholder='Prénom'><br>
        <label for='email'>Email :</label>
        <input type='email' name='email' required placeholder='Email'><br>
        <label for='mot_de_passe'>Mot de passe :</label>
        <input type='password' name='mot_de_passe' required placeholder='Mot de passe'><br>
        <button type='submit' name='submit'>Créer</button>
            </form>";
        return $form;
    }

    public static function formUpdate($action)
    {
        $form = "<form action = $action method='POST' class='formupdate'>
        <label for='nom'>Changer de nom: </label>
        <input type='text' name='nom' required placeholder='Changer son nom'><br>

        <label for='prenom'>Changer de prénom: </label>
        <input type='text' name='prenom' required placeholder='Changer son prénom' ><br>
        
        <label for='email'>Changer d'adresse email: </label>
        <input type='email' name='email' required placeholder='Changer son adresse email' ><br>

        <label for='mot_de_passe_update'>Changer de mot de passe: </label>
        <input type='password' name='mot_de_passe' required placeholder='Changer son mot de passe'><br>

        <button type='submit' name='submit'>Modifier</button>
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

   
}

/* if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
} */


    

