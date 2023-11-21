<?php

namespace Madmax\Skrrr\controller;

use Madmax\Skrrr\app\AbstractController;
use Madmax\Skrrr\app\Model;

class SecurityController {

    private $id_utilisateur;
    private $email;
    private $motDePasse;

    public function IdentificationLogin($id_utilisateur, $motDePasse)
    {
       
        if ($this->validateIds($id_utilisateur, $motDePasse)) {
            
            $this->createUserSession($id_utilisateur);

            
            header("Location: /index.php");
            exit();
        } else {
            echo "Identifiants incorrects";
        }
    }

    private function validateIds($id_utilisateur, $motDePasse)
    {

        $validId_utilisateur = "toto";
        $validHashedmotdepasse = 'root/parenVadrouille';

        return $id_utilisateur === $validId_utilisateur && password_verify($motDePasse, $validHashedmotdepasse);
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
        if(isset($_SESSION['username'])){
            header('Location: /');
            exit;
        }
    }

    public function protectAgainstSQLInjection($input)
    {
    }

    public function handleSession()
    {
    }

}
