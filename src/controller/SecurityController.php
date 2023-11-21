<?php

namespace Madmax\Skrrr\controller;

use Madmax\Skrrr\views\header;
use Madmax\Skrrr\app\AbstractController;
use Madmax\Skrrr\app\Model;


class SecurityController {

    private $id_utilisateur;
    private $username;
    private $email;
    private $motDePasse;

    public function IdentificationLogin($username, $motDePasse, $email)
    {
        // si les éléments suivants (utilisateur, mpd et email) sont valides, une session est créée.
        if ($this->validateIds($username, $motDePasse, $email)) {
            
            $this->createUserSession($username);

            header("Location: /index.php");
            exit();
        } else {
            echo "Identifiants incorrects";
        }
    }
     // Validation des identifiants demandés.
    private function validateIds($username, $motDePasse, $email)
    {

        $validUsername = "toto";
        $validHashedmotdepasse = 'root/parenVadrouille';
        $validEmail = "momo@bmomo.fr";

        return $username === $validUsername 
        && password_verify($motDePasse, $validHashedmotdepasse) 
        && password_verify($email, $validEmail);
    }

    // Démarrage d'une session.
    private function createUserSession($username)
    {
        session_start();
        $_SESSION['username'] = $username;
    }

    public function deconnexion()
{
    // Démarre la session si elle n'est pas déjà démarrée.
    session_start();

    // Parcourt les données de session.
    foreach($_SESSION as $key => $value) {
        unset($_SESSION[$key]);
    }

    // Redirige l'utilisateur vers la page d'accueil.
    header("Location: /index.php");
    exit();
}

    

    // rediriger vers l'accueil si l'utilisateur n'est pas connecté
    public function Redirection()
    {
        if(isset($_SESSION['utilisateur'])){
            header('Location: /');
            exit;
        }
    }

    public static function isConnected()
    {
        
            // Démarrer la session (si ce n'est pas déjà fait)
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        
            // Vérifier si la clé 'username' est définie dans la session
            return true;
        
    }

    public function protectAgainstSQLInjection($input)
    {

    }

    public function handleSession()
    {
    }



}
