<?php

namespace Madmax\Skrrr\controller;

use Madmax\Skrrr\app\AbstractController;
use Madmax\Skrrr\app\Model;

class SecurityController {


    public function IdentificationLogin($username, $password)
    {
       
        if ($this->validateIds($username, $password)) {
            
            $this->createUserSession($username);

            
            header("Location: /index.php");
            exit();
        } else {
            echo "Identifiants incorrects";
        }
    }

    private function validateIds($username, $password)
    {
        //valeurs temporairess
        $validUsername = "toto";
        $validPassword = "root";

        return $username === $validUsername && $password === $validPassword;
    }

    private function createUserSession($username)
    {
        session_start();

        $_SESSION['username'] = $username;
    }

    public function deconnexion()
    {
        session_start();
        session_destroy();

        header("Location: /index.php");
        exit();
    }

    public function checkAuthorization()
    {
    }

    public function protectAgainstSQLInjection($input)
    {
    }

    public function handleSession()
    {
    }

}
