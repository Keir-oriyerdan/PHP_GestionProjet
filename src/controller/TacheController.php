<?php 
/*
//faire en sorte que sur les taches on puisse asigner des etats qu'on retrouvera dans cycle controller
namespace Madmax\Skrrr\controller;

use Madmax\Skrrr\app\AbstractController;
use Madmax\Skrrr\controller\interfaces\EtatCycle;
use Madmax\Skrrr\controller\interfaces\CycleNonDebute;
use Madmax\Skrrr\app\Model;

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
        $result = Model::getInstance()->getById('tache', $_GET['id']);
        $this->render('projet.php', ['projet' => $result]);
    }
}
*/

namespace Madmax\Skrrr\controller;

use Madmax\Skrrr\app\AbstractController;
use Madmax\Skrrr\app\Model;

// Interface pour définir les états de cycle
interface EtatCycle {
    public function afficherEtat();
}

// Classe abstraite pour représenter une tâche
abstract class Tache implements EtatCycle {
    protected $etat;

    public function __construct(EtatCycle $etat) {
        $this->etat = $etat;
    }

    public function afficherEtat() {
        return $this->etat->afficherEtat();
    }
}

// Classe concrète pour l'état non débuté
class CycleNonDebute implements EtatCycle {
    public function afficherEtat() {
        return "Non débuté";
    }
}

// Classe concrète pour l'état en cours
class CycleEnCours implements EtatCycle {
    public function afficherEtat() {
        return "En cours";
    }
}

// Classe concrète pour l'état terminé
class CycleTermine implements EtatCycle {
    public function afficherEtat() {
        return "Terminé";
    }
}

// Contrôleur de tâche
class TacheController extends AbstractController {
    public function displayTache() {
        $result = Model::getInstance()->getById('tache', $_GET['id']);

        // Utilisation de la classe Tache avec l'état non débuté par défaut
        $tache = new Tache(new CycleNonDebute());

        $this->render('projet.php', ['projet' => $result, 'etatTache' => $tache->afficherEtat()]);
    }
}
