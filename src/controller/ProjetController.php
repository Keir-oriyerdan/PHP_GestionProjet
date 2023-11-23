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

    /* Création du formulaire pour crée des projets */
    public function ProjetForm()
    {
        if (isset($_POST['submit'])) {
            $datas = [
                'nom' => $_POST['nom'],
                'description' => $_POST['description'],
            ];
            $this->createProjet($datas);
            $this->displayProjets();
        } else {
            $form = [
                'form' => FormProjet::createForm('?controller=ProjetController&method=ProjetForm'),
            ];
            $this->render('ProjetForm.php', $form);
        }
    }

    public function supprimerProjet()
    {
        Model::getInstance()->deleteById('projet', $_GET['id']);
        $this->displayProjets();
    }

    /* formulaire update du projet */
    public function updateProjet()
    {
        if (isset($_POST['submit'])) {
            $datas = [
                'nom' => $_POST['nom'],
                'description' => $_POST['description'],
            ];
            Model::getInstance()->updateById('projet', $_GET['id'], $datas);
            $this->displayProjets();
        } else {
            $form = [
                'form' => FormProjet::createForm('?controller=ProjetController&method=updateProjet&id=' . $_GET['id'], 'update', $_GET['id']),
            ];
            $this->render('ProjetForm.php', $form);
        }
    }

    /* afficher l'administratreur du projet */
    public static function getAdmin()
    {
        $result = Model::getInstance()->getDataFromEntity(
            [
                'utilisateur.Nom',
                'utilisateur.Prenom',
            ],
            'utilisateur',
            [
                'administrateur',
                'projet',
            ],
        );
        $datas = [
            'administrateur' => $result,
        ];
        return $result;
    }
}