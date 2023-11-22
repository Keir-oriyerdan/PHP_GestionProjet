<?php

namespace Madmax\Skrrr\controller;

use Madmax\Skrrr\app\AbstractController;
use Madmax\Skrrr\app\Model;
use Madmax\Skrrr\forms\FormUtilisateur;

class UtilisateurController extends AbstractController
{

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
        if (isset($_POST['submit'])) {
            $datas = [
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
            ];
            $this->creerUtilisateur($datas);
        }
        $form = [
            'form' => FormUtilisateur::createForm('?controller=UtilisateurController&method=ajoutUtilisateur'),
        ];
        $this->render('ajoutUtilisateur.php', $form);
    }

    public function supprimerUtilisateur()
    {
        Model::getInstance()->deleteById('utilisateur', $_GET['id']);
        $this->displayUtilisateurs();
    }

    public function updateUtilisateur()
    {
        if (isset($_POST['submit'])) {
            $datas = [
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom']
            ];
            Model::getInstance()->updateById('utilisateur', $_GET['id'], $datas);
            $this->displayUtilisateurs();
        } else {
            $form = [
                'form' => FormUtilisateur::createForm('?controller=UtilisateurController&method=updateUtilisateur&id=' . $_GET['id'], 'update', $_GET['id']),
            ];
            $this->render('ajoutUtilisateur.php', $form);
        }
    }
}
