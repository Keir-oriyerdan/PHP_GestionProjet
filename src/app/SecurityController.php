<?php

namespace Madmax\Skrrr\app;

use Madmax\Skrrr\views\header;
use Madmax\Skrrr\app\AbstractController;
use Madmax\Skrrr\app\Model;
use PDO;

class SecurityController {

    private $id_utilisateur;
    private $username;
    private $email;
    private $motDePasse;

    public static function isConnected()
    {
        // Démarrer la session si pas active.
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Vérifiez si l'utilisateur est connecté, sinon redirection vers page accueil.
        if (isset($_SESSION["id_utilisateur"])) { // remettre le !
            echo '<a href=?controller=IndexController&method=index>Accueil</a>';
            exit();
        } else {
            // Si l'authentification réussit, retourner vrai.
            return true;
        }
    }

    // Validation des identifiants demandés.
    private function validateIds($username, $motDePasse, $email)
    {
        

        // Si l'utilisateur, le mot de passe est correct & l'email correspondent c'est bon.
        if ($username && password_verify($motDePasse, $username['mot_de_passe']) && $email === $username['email']) {
            // Hacher le mot de passe de manière sécurisée
            $hashedPassword = password_hash($motDePasse, PASSWORD_BCRYPT);

            // Valider l'email
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);
            if ($email === false) {
                // si email non valide, message d'erreur s'affiche.
                $errorMessage = "L'email fourni n'est pas valide.";
               
                echo $errorMessage;
                //redirection si erreur
                header("Location: /?controller=IndexController&method=index>Accueil");
                exit();
            }

            // Stocker l'ID de l'utilisateur dans la session
            $_SESSION['id_utilisateur'] = $username['id_utilisateur'];

            // Regénérer l'ID de session si l'authentification est réussie
            session_regenerate_id(true);
        }
    }

    public function deconnexion()
    {
        // Démarre la session si elle n'est pas déjà démarrée.
        session_start();

        // Parcourir les données de session.
        foreach($_SESSION as $key => $value) {
            unset($_SESSION[$key]);
        }
        // La session est détruite suite à la déconnexion.
        session_destroy();
        // Redirige l'utilisateur vers la page d'accueil.
        header("Location: /?controller=IndexController&method=index>Accueil");
        exit();
    }

    public function protectAgainstSQLInjection($input)
    {
    }

    public function handleSession()
    {
    }
}

