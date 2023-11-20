<?php

namespace Madmax\Skrrr\controller;

use Madmax\Skrrr\app\AbstractController;
use Madmax\Skrrr\app\Model;

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

        $result = Model::getInstance()->getById('utilisateur', $_GET['idUtilisateur']);
        $this->render('utilisateur.php', ['utilisateur' => $result]);
    }
}