<?php

namespace Madmax\Skrrr\controller;

use Madmax\Skrrr\app\AbstractController;
use Madmax\Skrrr\app\Model;

class Administrateur extends AbstractController {
    public function setAdmin()
    {
        $datas = [
            'ID_Utilisateur' => $_GET['id'],
        ];
        Model::getInstance()->save('administrateur', $datas);
    }
}