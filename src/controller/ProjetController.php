<?php

namespace Madmax\Skrrr\controller;

use Madmax\Skrrr\app\AbstractController;
use Madmax\Skrrr\app\Model;
use Madmax\Skrrr\forms\FormProjet;

class ProjetController extends AbstractController{
    
    public function createProjet($data)
    {
        Model::getInstance()->save('projet', $data);
    }

    public function displayProjets()
    {
        $results = Model::getInstance()->readAll('projet');
        $this->render('projets.php', ['projets' => $results]);
    }

    public function displayProjet()
    {
        $result = Model::getInstance()->getById('projet', $_GET['id']);
        $this->render('projet.php', ['projet' => $result]);
    }

    /* public function ProjetForm()
    {
        $results = Model::getInstance()->readAll('projet');
        $this->render('ProjetForm.php', ['creationProjet' => $results]);
    } */


    public function ProjetForm()
    {
        if (isset($_POST['submit'])) {
            $datas = [
                'nom' => $_POST['nom'],
                'description' => $_POST['description'],
                'ID_Administrateur' => $_POST['admin'],
            ];
            var_dump($datas);
            $this->createProjet($datas);
            $this->displayProjets();
        } else {
            $form = [
                'form' => FormProjet::createForm('?controller=ProjetController&method=ProjetForm'),
            ];
            $this->render('ProjetForm.php', $form);
        }
    }

    /* public function updateProjet()
    {
        $datas = [
            'titre' => $_GET['titre'],
        ];

        Model::getInstance()->updateById('projet',$_GET['id'], $datas);
    } 
    
    ?controller=ProjetController&method=ProjetForm
    
    */
}