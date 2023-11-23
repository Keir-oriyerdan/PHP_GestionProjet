<?php

namespace Madmax\Skrrr\app;

use Madmax\Skrrr\views\header;
use Madmax\Skrrr\app\AbstractController;
use Madmax\Skrrr\app\Model;
use Madmax\Skrrr\forms\FormConnexion;
use PDO;

class SecurityController
{

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
    private function validateIds()
    {
        // Si l'utilisateur et le mot de passe sont corrects c'est bon. Il faut reprendre car pas fini.
        if (isset($_POST['submit']) && htmlspecialchars($_POST['username']) === Model::getInstance()->getByAttribute('utilisateur', 'Username', htmlspecialchars($_POST['username'])) && password_verify($_POST['password'], Model::getInstance()->getByAttribute('utilisateur', 'Username', $_POST['username'], '=', 'Password'))) {
            // Stocker l'ID de l'utilisateur dans la session
            $_SESSION['username'] = $_POST['username'];
            // Regénérer l'ID de session si l'authentification est réussie
            return true;
        }
        return false;
    }

    public function deconnexion()
    {
        // Démarre la session si elle n'est pas déjà démarrée.
        session_start();

        // Parcourir les données de session.
        foreach ($_SESSION as $key => $value) {
            unset($_SESSION[$key]);
        }
        // La session est détruite suite à la déconnexion.
        session_destroy();
        // Redirige l'utilisateur vers la page d'accueil.
        header("Location: /?controller=IndexController&method=index>Accueil");
        exit();
    }

    public function connect()
    {
        FormConnexion::createForm('?controller=SecurityController&method=connect');
        if ($this->validateIds()) {
            # code...
        }
    }

    public function protectAgainstSQLInjection($input)
    {
    }

    public function handleSession()
    {
    }
}
