<?php

namespace Madmax\Skrrr\controller;

use Madmax\Skrrr\app\Model;

class UtilisateurController {

    public function creerUtilisateur($data)
    {
        Model::getInstance()->save('utilisateur', $data);
    }
}