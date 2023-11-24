<?php

namespace Madmax\Skrrr\controller;

use Madmax\Skrrr\app\AbstractController;
use Madmax\Skrrr\app\SecurityController;
use Madmax\Skrrr\app\Model;
use Madmax\Skrrr\forms\FormConnexion;

class ConnexionController extends AbstractController
{
    public function connect()
    {
        if (!SecurityController::isConnected()) {
            $result = FormConnexion::createForm('?controller=ConnexionController&method=connect');
            $form = [
                'form' => $result,
            ];
            $this->render('connexion.php', $form);
            if (isset($_POST['submit']) && SecurityController::validateIds()) {
                $_SESSION['connecté'] = 'connecté';
                // Stocker l'ID de l'utilisateur dans la session
                $_SESSION['username'] = htmlspecialchars($_POST['username']);
                $ID = Model::getInstance()->getByAttribute('utilisateur', 'Username', htmlspecialchars($_POST['username']), '=', 'ID');
                $ID = $ID[0]->getID();
                $_SESSION['ID'] = $ID;
                header("Location: ?controller=IndexController&method=index");
            } else {
                if (isset($_POST['submit'])) {
                    echo 'Identifiants incorrects';
                }
            }
        } else {
            header("Location: ?controller=IndexController&method=index");
        }
    }

    public function deconnexion()
    {
        // Parcourir les données de session.
        if (isset($_SESSION['connecté'])) {
            foreach ($_SESSION as $key => $value) {
                unset($_SESSION[$key]);
            }
            // La session est détruite suite à la déconnexion.
            session_destroy();
        }
        // Redirige l'utilisateur vers la page d'accueil.
        header("Location: ?controller=IndexController&method=index");
        exit();
    }
}
