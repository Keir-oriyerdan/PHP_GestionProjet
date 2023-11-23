<?php

namespace Madmax\Skrrr\controller;

use Madmax\Skrrr\app\AbstractController;
use Madmax\Skrrr\controller\IndexController;
use Madmax\Skrrr\app\Model;

class AdministrateurController extends AbstractController {

    // Fonction pour définir un user comme admin
    public function setAdmin()
    {
        // Création d'un tableau de données avec l'ID de l'user à définir comme admin.
        $datas = [
            'ID_Utilisateur' => $_GET['id'],
        ];
        // Appel de la fonction pour enregistrer les données dans la table 'administrateur'
        Model::getInstance()->save('administrateur', $datas);
    }

    // Fonction pour supprimer le statut d'admin d'un user
    public function deleteAdmin()
    {
        // Appel de la fonction pour supprimer un enregistrement d'admin par ID
        Model::getInstance()->deleteById('administrateur', $_GET['id']);
        
        // Création d'une instance de IndexController. 
        $index = new IndexController();
        // appel de sa méthode index.
        $index->index();
    }

    // Fonction pour afficher tous les administrateurs
    public function displayAdmins()
    {
        // Appel de la fonction pour récupérer et afficher tous les administrateurs
        Model::getInstance()->readAll('administrateur');
    }

}

