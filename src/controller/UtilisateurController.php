<?php

namespace Madmax\Skrrr\controller;

use Madmax\Skrrr\app\AbstractController;
use Madmax\Skrrr\app\Model;
use Madmax\Skrrr\forms\FormUtilisateur;

class UtilisateurController extends AbstractController {

    public function creerUtilisateur($data)
    {
        Model::getInstance()->save('utilisateur', $data);
    }

    public function displayUtilisateurs()
    {
        $results = Model::getInstance()->readAll('utilisateur');
        $this->render('utilisateurs.php', ['utilisateurs' => $results]);
    }

    public function displayUtilisateur()
    {
        $result = Model::getInstance()->getById('utilisateur', $_GET['id']);
        $this->render('utilisateur.php', ['utilisateur' => $result]);
    }

    public function ajoutUtilisateur()
    {
        if (isset($_POST['nom'])) {
            $datas = [
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
            ];
            $this->creerUtilisateur($datas);
        } else {
            $form = [
                'form' => FormUtilisateur::createForm('?controller=UtilisateurController&method=ajoutUtilisateur'),
            ];
            $this->render('ajoutUtilisateur.php', $form);
        }
    }
}