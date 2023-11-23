<?php

namespace Madmax\Skrrr\controller;

use Madmax\Skrrr\app\AbstractController;
use Madmax\Skrrr\app\Model;
use Madmax\Skrrr\forms\FormUtilisateur;
use Madmax\Skrrr\controller\ProjetController;

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
            $password = $_POST['password'];
            password_hash($password, PASSWORD_BCRYPT);
            $datas = [
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'Email' => $_POST['email'],
                'password' => $password,
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

    // créa du projet.
    public function createProject()
    {
        // Récupérez l'ID de l'user qui crée le projet
        $id_utilisateur = $_SESSION['id_utilisateur']; 
        //!! il faut verif l'ID de l'utilisateur est stocké dans la session.

        // Enregistre le projet dans la bdd.
        $projectData = [
            'nom' => $_POST['nom_projet'],
            'description' => $_POST ['Description du projet'],
            'état' => $_POST ['état'],
            'priorité' => $_POST ['priorité'],
        ];

        $projectId = Model::getInstance()->save('projet', $projectData);

        // Définir l'user qui crée le projet comme administrateur
        $this->setAdmin($projectId, $id_utilisateur);
    }

    private function setAdmin($projectId, $id_utilisateur)
    {
        // Enregistrez l'utilisateur comme administrateur du projet
        $adminData = [
            'id_utilisateur' => $id_utilisateur,
            'ID_Projet' => $projectId,
        ];
        Model::getInstance()->save('administrateur', $adminData);
    }

    public function adminAddUser($id_utilisateur)
    {
        $projectId = $_GET['ID_Projet']; // Obtenez l'ID du projet à partir de la requête.

        // Vérif si l'user actuel est connecté et s'il est un administrateur du projet.
        $id_utilisateur = $_SESSION['id_utilisateur']; 
        // on récup les détails du projet depuis la bdd.
        $project = Model::getInstance()->getById('project', $projectId); 

        if ($project instanceof ProjetController) {
            // Vérif si l'utilisateur est l'admin du projet
            if ($project->isAdmin($id_utilisateur)) {
                // si User est un admin, il peut ajouter des users au projet.
                $this->addUserToProject($projectId, $_POST['id_utilisateur']); // !! il faut valider et filtrer cette entrée
            } else {
                // si L'user n'est pas admin, on affiche un message d'erreur
                echo "Vous n'avez pas les droits d'administrateur pour effectuer cette action.";
            }
        } else {
            // Si Le projet n'existe pas
            echo "Le projet n'existe pas.";
        }
    }

    private function addUserToProject($projectId, $id_utilisateur)
    {
        // !!! Verifier les entrées dupliquées ou d'autres vérifications de validation.

        // Met à jour la table utilisateur pour associer l'user au projet
        Model::getInstance()->updateById('utilisateur', $id_utilisateur, ['ID_Projet' => $projectId]);

        // affichage d'un message de réussite
        echo "Youpi ! L'utilisateur a été ajouté au projet.";
    }

    

}
