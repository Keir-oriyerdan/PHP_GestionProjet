<?php

namespace Madmax\Skrrr\app;

use Madmax\Skrrr\config\Config;

class Dispatcher {

    // Fonction statique pour dispatcher les requêtes.
    public static function Dispatch()
    {
        $c = false; // Variable qui stocke le nom de la classe du contrôleur
        $m = false; // Variable qui stocke le nom de la méthode du contrôleur

        // Verif si les paramètres 'controller' et 'method' sont définis dans la requête.
        if (isset($_GET['controller']) && isset($_GET['method'])) {
            // Verif si la classe du contrôleur existe.
            if (class_exists(Config::CONTROLLER . $_GET['controller'])) {
                // Construis le nom complet de la classe du contrôleur
                $c = Config::CONTROLLER . $_GET['controller']; 
                // Créer une instance du contrôleur.
                $controller = new $c(); 
                // Verif si la méthode du contrôleur existe.
                if (method_exists($controller, $_GET['method'])) {
                    // Stock le nom de la méthode
                    $m = $_GET['method']; 
                    // Appele la méthode du contrôleur.
                    $controller->$m(); 
                    return;
                }
            } 
        } 

        // Si les paramètres ne sont pas définis ou les classes/méthodes ne sont pas trouvées, utiliser les valeurs par défaut
        $c = Config::CONTROLLER . Config::DEFAULT_CONTROLLER; // Construire le nom complet de la classe du contrôleur par défaut
        $m = Config::DEFAULT_METHOD; // Utiliser la méthode par défaut
        $controller = new $c(); // Créer une instance du contrôleur par défaut
        $controller->$m(); // Appeler la méthode par défaut
    }
}