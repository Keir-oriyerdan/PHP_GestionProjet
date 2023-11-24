<?php

namespace Madmax\Skrrr\forms;

use Madmax\Skrrr\app\model;

class FormUtilisateur
{
    // Propriétés privées de la classe
    private $id;
    private $id_utilisateur;
    private $nom;
    private $prenom;
    private $email;
    private $motDePasse;

    // Constructeur de la classe
    public function __construct($nom, $prenom, $email, $motDePasse)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->motDePasse = $motDePasse;
    }

     // créer un formulaire en fonction du mode.
    public static function createForm($action, $mode = 'create', $id = 0)
    {
        // Si le mode est 'update', on récupére les données utilisateur et on retourne le formulaire de mise à jour.
        if ($mode === 'update') {
            Model::getInstance()->getById('utilisateur', $id);
            return self::formUpdate($action);
        }
        // sinon, on retourne le form de créa
        return self::form($action);
    }

    // Formulaire de créa d'user.
    public static function form($action)
    {
        $form = "<form action = $action method='POST'>
        <label for='nom'>Nom :</label>
        <input type='text' name='nom' required placeholder='Nom'><br>
        <label for='prenom'>Prénom :</label>
        <input type='text' name='prenom' required placeholder='Prénom'><br>
        <label for='username'>Nom d'utilisateur :</label>
        <input type='text' name='username' required placeholder='Nom d utilisateur'><br>
        <label for='email'>Email :</label>
        <input type='email' name='email' required placeholder='Email'><br>
        <label for='mot_de_passe'>Mot de passe :</label>
        <input type='password' name='mot_de_passe' required placeholder='Mot de passe'><br>
        <button type='submit' name='submit'>Créer</button>
            </form>";
        return $form;
    }

    // form mise à jour d'user.
    public static function formUpdate($action)
    {
        $form = "<form action = $action method='POST'>
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

    //message de succès d'enregistrement
    public function enregistrerUtilisateur()
    {
        echo "L'utilisateur {$this->prenom} {$this->nom} a été enregistré !";
    }

    // valider les données d'inscription
    public function validerInscription()
    {
        $error = [];
         // verif que l'user remplit les champs obligatoires.
        if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['mot_de_passe'])) {
            $error[] = 'Veuillez compléter tous les champs.';
        }
        // verif de la longueur du nom d'user.
        if (isset($_POST['username']) && strlen($_POST['username']) < 5) {
            $error[] = 'Le nom d\'utilisateur doit comporter 5 caractères minimum';
        }
         // verif du mot de passe
        if (isset($_POST['mot_de_passe'])) {
            $password = $_POST['mot_de_passe'];
            // VERIF de la longueur du mdp.
            if (strlen($password) < 5) {
                $error[] = 'Le mot de passe doit comporter 5 caractères minimum';
            }
            //Vérif de la présence d'un caractère spécial dans le mot de passe.
            if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
                $error[] = 'Le mot de passe doit contenir au moins un caractère spécial';
            }
        }
        // Vérification de la correspondance des mots de passe en cas de créa ou mise à jour
        if (isset($_POST['mot_de_passe']) && isset($_POST['passwordverify']) && ($_POST['mot_de_passe'] !== $_POST['passwordverify'])) {
            $error[] = 'Les mots de passe doivent être identiques';
        }
        // Retourne les erreurs s'il y en a, sinon retourne true
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


    

