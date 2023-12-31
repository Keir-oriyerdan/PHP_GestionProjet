<?php

namespace Madmax\Skrrr\forms;

use PDO;
use Madmax\Skrrr\app\model;

class FormConnexion
{

    private $id_utilisateur;
    private $email;
    private $motDePasse;


    public function __construct($id_utilisateur, $email, $motDePasse)
    {
        $this->id_utilisateur = $id_utilisateur;
        $this->email = $email;
        $this->motDePasse = $motDePasse;
    }

    //créer un formulaire en fonction du mode.
    public static function createForm($action, $mode = 'create', $id = 0)
    {
        if ($mode === 'update') {
            $id_utilisateur = Model::getInstance()->getById('utilisateur', $id);
            return self::form($action);
        }
        return self::form($action);
    }


    public static function form($action)
    {
        $form = "<form action = $action method='POST'>
        <label for='username'>Nom d'utilisateur</label>
        <input type='text' name='username' class='form-control' autocomplete='username' required autofocus>
        <label for='password'>Mot de passe</label>
        <input type='password' name='password' id='password' class='form-control'>
        <button class='btn' type='submit' name='submit'>
            Se connecter
        </button>
            </form>";
        return $form;
    }

    //vérifier les informations de connexion
    function VerifConnexion()
    {
    //$error est initialisée à false. 
    //Utilisé pour signaler s'il y a erreur aprés vérif des données.
    $error = false;
    // verif si le form a été soumis
    if (isset($_POST['submit'])) {
        // récup des données du formulaire.
        $id_utilisateur = $_POST['username'];
        $email = $_POST['email'];
        $motDePasse = $_POST['mot_de_passe'];

        // validation et verif que l'email est valide
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            $error = 'Veuillez entrer une adresse e-mail valide.';
            return $error;
        }

        // Connexion à la base de données
        $pdo = new PDO("mysql:host=localhost;dbname=projet1b", "username", "mot_de_passe");

        // Préparer la requête
        $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE username = :username");

        // Liaison des paramètres
        $stmt->bindParam(':username', $id_utilisateur, PDO::PARAM_STR);

        // Exécution de la requête
        $stmt->execute();

        // Récupération de l'utilisateur.
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifier si l'utilisateur existe et si le mot de passe est correct
        if (!$user || !password_verify($motDePasse, $user['mot_de_passe'])) {
            $error = 'Identifiants incorrects';
            return $error;
        }

        // Vérifier l'e-mail
        if ($email !== $user['email']) {
            $error = 'Identifiants incorrects';
            return $error;
        }

        // Si tout est correct, la connexion est faite.
       if (isset($_SESSION['connected'])){
        return true;
       }
        
        // Si la session 'username' n'est pas définie, cela signifie que l'utilisateur n'est pas connecté
        if(!isset($_SESSION['username'])){
            //donc     // Redirection vers la page d'accueil (index.php).
            header('Location:index.php');
            // Terminer l'exécution du script (avant la redirection)
            exit;
        }
    }

    return $error;
}


}



