<?php

namespace Madmax\Skrrr\app;

use Madmax\Skrrr\views\header;
use Madmax\Skrrr\app\AbstractController;
use Madmax\Skrrr\app\Model;
use Madmax\Skrrr\forms\FormConnexion;
use PDO;

class SecurityController extends AbstractController
{

    private $id_utilisateur;
    private $username;
    private $email;
    private $motDePasse;

    public static function isConnected()
    {
        // Démarrer la session si pas active.
        /*         if (session_status() == PHP_SESSION_NONE) {
            session_start();
        } */

        // Vérifiez si l'utilisateur est connecté, sinon redirection vers page accueil.
        if (!isset($_SESSION["connecté"])) { // remettre le !
            echo '<a href=?controller=IndexController&method=index>Accueil</a>';
            return false;
        } else {
            // Si l'authentification réussit, retourner vrai.
            return true;
        }
    }

    // Validation des identifiants demandés.
    public static function validateIds()
    {
        $user = Model::getInstance()->getByAttribute('utilisateur', 'Username', htmlspecialchars($_POST['username']));
        if (array_key_exists(0, $user)) {
            $username = $user[0]->getUsername();
            $password = $user[0]->getPassword();
        }
        // Si l'utilisateur et le mot de passe sont corrects c'est bon.
        if (isset($username) && isset($password)) {
            if (isset($_POST['submit']) && (htmlspecialchars($_POST['username']) === $username) && password_verify(htmlspecialchars($_POST['password']), $password)) {
                // Regénérer l'ID de session si l'authentification est réussie
                return true;
            }
        }
        return false;
    }

    public function protectAgainstSQLInjection($input)
    {
    }

    public function handleSession()
    {
    }
}
