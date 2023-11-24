<?php 

//faire en sorte que sur les taches on puisse asigner des etats qu'on retrouvera dans cycle controller
namespace Madmax\Skrrr\controller;

use Madmax\Skrrr\app\AbstractController;
use Madmax\Skrrr\controller\interfaces\EtatCycle;
use Madmax\Skrrr\controller\interfaces\CycleNonDebute;
use Madmax\Skrrr\app\Model;
use Madmax\Skrrr\entity\tache;

namespace Madmax\Skrrr\controller;

use Madmax\Skrrr\app\AbstractController;
use Madmax\Skrrr\app\Model;
use Madmax\Skrrr\entity\Tache;

// Contrôleur de tâche
class TacheController extends AbstractController {

    public function displayTache() {
        $result = Model::getInstance()->getById('tache', $_GET['id']);

       
        $tache = new Tache();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['etat_tache'])) {
            // Modif l'état de la tâche.
            switch ($_POST['etat_tache']) {
                case 'non_debute':
                    $tache->setId(1); // ID pour l'état "Non débuté"
                    break;
                case 'en_cours':
                    $tache->setId(2); // ID pour l'état "En cours"
                    break;
                case 'termine':
                    $tache->setId(3); // ID pour l'état "Terminé"
                    break;
                default:
                    // Gérer les erreurs ou fournir un état par défaut
                    break;
            }
        }

        $this->render('projet.php', ['projet' => $result, 'etatTache' => $tache->afficherEtat()]);

    }

    public static function displayTaches()
    {
        return Model::getInstance()->getTache();
    }

}

/*
class TacheController extends AbstractController {

    /* private EtatCycle $etattache;

    public function __construct()
    {
        $this->etattache = new CycleNonDebute();
    }

    public function EtatTache()
    {
        $this->etattache = $this->etattache->EtatNonDebute();
    } */

   /* public function displayTache()
    {
        return Model::getInstance()->getTache();
    }
}
*/

