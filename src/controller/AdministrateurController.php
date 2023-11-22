<?php

namespace Madmax\Skrrr\controller;

use Madmax\Skrrr\app\AbstractController;
use Madmax\Skrrr\controller\IndexController;
use Madmax\Skrrr\app\Model;

class Administrateur extends AbstractController {
    public function setAdmin()
    {
        $datas = [
            'ID_Utilisateur' => $_GET['id'],
        ];
        Model::getInstance()->save('administrateur', $datas);
    }

    public function deleteAdmin()
    {
        Model::getInstance()->deleteById('administrateur', $_GET['id']);
        $index = new IndexController();
        $index->index();
    }

    public function displayAdmins()
    {
        Model::getInstance()->readAll('administrateur');
    }
}