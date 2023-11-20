<?php

namespace Madmax\Skrrr\controller;

use Madmax\Skrrr\app\AbstractController;
use Madmax\Skrrr\App\Model;

class ProjetController extends AbstractController{

    public function displayProjets()
    {
        $results = Model::getInstance()->readAll('projet');
        $this->render('projets.php', ['projets' => $results]);
    }

    public function ProjetForm()
    {
        $results = Model::getInstance()->readAll('projet');
        $this->render('ProjetForm.php', ['creationProjet' => $results]);
    }

    public function createProjet()
    {
        $datas = [
            'nom' => 'projet 1',
        ];
        Model::getInstance()->save('projet', $datas);
    }

    // public function updateProjet()
    // {
    //     $datas = [
    //         'titre' => $_GET['titre'],
    //     ];

    //     Model::getInstance()->updateById('projet',$_GET['id'], $datas);
    // }
}