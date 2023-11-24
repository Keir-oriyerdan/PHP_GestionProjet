<?php

namespace Madmax\Skrrr\controller;

use Madmax\Skrrr\app\AbstractController;
use Madmax\Skrrr\app\Model;
use Madmax\Skrrr\app\SecurityController;
use Madmax\Skrrr\forms\FormProjet;

class ProjetController extends AbstractController{
    
    // Fonction pour créer un projet
    public function createProjet($data)
    {
        Model::getInstance()->save('projet', $data);
    }
    // fonction pour afficher tous les projets.
    public function displayProjets()
    {
    if (SecurityController::isConnected()) {
        $results = Model::getInstance()->readAll('projet');
        $this->render('projets.php', ['projets' => $results]);
        } else {
            header("Location: ?controller=IndexController&method=index");
        }
    }
    //fonction pour afficher Un projet.
    public function displayProjet()
    {
        if (SecurityController::isConnected()) {
            $result = Model::getInstance()->getById('projet', $_GET['id']);
            $this->render('projet.php', ['projet' => $result]);
        }
    }
    //fonction pour afficher gérer le formulaire de projet.
    public function ProjetForm()
    {
        // Si le formulaire est soumis
        if (isset($_POST['submit'])) {
            AdministrateurController::setAdmin();
            $ID_Admin = Model::getInstance()->getByAttribute('administrateur', 'ID_Utilisateur', $_SESSION['ID'], '=', 'ID');
            $ID_Admin = $ID_Admin[0]->getID();
            // Récupérer les données du formulaire
            $datas = [
                'nom' => $_POST['nom'],
                'description' => $_POST['description'],
                'ID_Administrateur' => $ID_Admin,
            ];
            // Appeler la fonction pour créer un projet avec les données
            $this->createProjet($datas);
            // Afficher tous les projets après la création
            $this->displayProjets();
        } else {
            // Si le formulaire n'est pas soumis, afficher le formulaire
            $form = [
                'form' => FormProjet::createForm('?controller=ProjetController&method=ProjetForm'),
            ];
            $this->render('ProjetForm.php', $form);
        }
    }
    //fonction pour supprimer un projet 
    public function supprimerProjet()
    {
        // Appeler la fonction pour supprimer un projet par son ID
        Model::getInstance()->deleteById('projet', $_GET['id']);
        // Afficher tous les projets après la suppression
        $this->displayProjets();
    }
    //Mettre à jour un projet.
    public function updateProjet()
    {
        // Si le formulaire de mise à jour est soumis.
        if (isset($_POST['submit'])) {
            // Récupérer les données du formulaire
            $datas = [
                'nom' => $_POST['nom'],
                'description' => $_POST['description'],
                'etat' => $_POST['etat']// etat non commencé, en cours ou terminé.
            ];
            // Appeler la fonction pour mettre à jour un projet par son ID.
            Model::getInstance()->updateById('projet', $_GET['id'], $datas);
            // Afficher tous les projets après la mise à jour
            $this->displayProjets();
        } else {
            // Si le formulaire de mise à jour n'est pas soumis, afficher le formulaire.
            $form = [
                'form' => FormProjet::createForm('?controller=ProjetController&method=updateProjet&id=' . $_GET['id'], 'update', $_GET['id']),
            ];
            $this->render('ProjetForm.php', $form);
        }
    }
    //récupérer les admins
    public static function getAdmin()
    {
        // Appeler la fonction pour récupérer des données liées aux administrateurs et aux projets
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
        // Retourner les résultats
        return $result;
    }
}