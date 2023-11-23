<?php

namespace Madmax\Skrrr\controller;

use Madmax\Skrrr\app\AbstractController;
use Madmax\Skrrr\app\Model;
use Madmax\Skrrr\forms\FormUtilisateur;
use Madmax\Skrrr\entity\Projet;

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
                'prenom' => $_POST['prenom'],
                'username' => $_POST['username']
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

    public function isAdmin($id_utilisateur, $id_project)
    {
        // Vérifiez dans la table 'administrateur' si l'user avec l'ID $id_utilisateur est associé à ce projet en tant qu'administrateur
        $adminData = Model::getInstance()->readAll('administrateur',['id_utilisateur' => $id_utilisateur, 'ID_Projet' => $this->getByID()]);

        // Si l'entrée existe, l'user est admin
        return !empty($adminData);

        if ($id_project instanceof Projet) {
            // Vérifiez si l'utilisateur est l'admin du projet
            if ($id_project->isAdmin($id_utilisateur)) {
                // Vérifiez si le projet a déjà un administrateur
                if ($id_project->hasAdmin()) {
                    // Le projet a déjà un admin
                    echo "Le projet a déjà un administrateur. Vous ne pouvez pas ajouter un nouvel administrateur.";
                } else {
                    // Ajout de l'user comme admin du projet
                    $this->addUserToProject($id_project, $_POST['id_utilisateur']); // !!! Il faut valider et filtrer cette entrée
                }
            } else {
                
                echo "Vous n'avez pas les droits d'administrateur pour effectuer cette action.";
            }
        } else {
            // Si le projet n'existe pas
            echo "Le projet n'existe pas.";
        }
    }

    

    public function hasAdmin()
    {
        // Vérifiez dans la table 'administrateur' si ce projet a déjà un administrateur associé
        $adminData = Model::getInstance()->readAll('administrateur',['ID_Projet'=> $this->getByID()]);

        // Si l'entrée existe, le projet a déjà un administrateur
        return !empty($adminData);
    }

    public function adminAddUser($id_utilisateur)
    {
        $id_projet = $_GET['ID_Projet']; // Obtenez l'ID du projet à partir de la requête.

        // Vérif si l'user actuel est connecté et s'il est un administrateur du projet.
        $id_utilisateur = $_SESSION['id_utilisateur']; 
        // on récup les détails du projet depuis la bdd.
        $project = Model::getInstance()->getById('project', $id_projet); 

        
    }

    private function addUserToProject($id_projet, $id_utilisateur)
    {
        // !!! Verifier les entrées dupliquées ou d'autres vérifications de validation.

        // Met à jour la table utilisateur pour associer l'user au projet
        Model::getInstance()->updateById('utilisateur', $id_utilisateur, ['ID_Projet' => $id_projet]);

        // affichage d'un message de réussite
        echo "Youpi ! L'utilisateur a été ajouté au projet.";
    }

    

}
