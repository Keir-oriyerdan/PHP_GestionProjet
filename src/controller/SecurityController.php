<?php

namespace Madmax\Skrrr\controller;

use Madmax\Skrrr\views\header;
use Madmax\Skrrr\app\AbstractController;
use Madmax\Skrrr\app\Model;


class SecurityController {

    private $id_utilisateur;
    private $email;
    private $motDePasse;

    public function IdentificationLogin($id_utilisateur, $motDePasse, $email)
    {
        // si les éléments suivants (utilisateur, mpd et email) sont valides, une session est créée.
        if ($this->validateIds($id_utilisateur, $motDePasse, $email)) {
            
            $this->createUserSession($id_utilisateur);

            header("Location: /index.php");
            exit();
        } else {
            echo "Identifiants incorrects";
        }
    }

    private function validateIds($id_utilisateur, $motDePasse, $email)
    {

        $validId_utilisateur = "toto";
        $validHashedmotdepasse = 'root/parenVadrouille';
        $validEmail = "momo@bmomo.fr";

        return $id_utilisateur === $validId_utilisateur 
        && password_verify($motDePasse, $validHashedmotdepasse) 
        && password_verify($email, $validEmail);
    }

    private function createUserSession($id_utilisateur)
    {
        session_start();
        $_SESSION['utilisateur'] = $id_utilisateur;
    }

    public function deconnexion()
    {
        session_start();
        session_destroy();

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
