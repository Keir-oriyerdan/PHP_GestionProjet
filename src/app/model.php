<?php

namespace Madmax\Skrrr\app;

use PDO;
use Madmax\Skrrr\config\Config;

class Model extends PDO
{
    // Variable statique qui stocker l'instance unique de la classe.
    private static $instance = null;

     // Constructeur privé pour empêcher l'instanciation directe.
    private function __construct()
    {
        try {
             // Appel du constructeur de la classe parente PDO pour se connecter à la BDD.
            parent::__construct(
                "mysql:dbname=" . Config::DBNAME . ";host=" . Config::DBHOST,
                Config::DBUSER,
                Config::DBPWD
            );
        } catch (\PDOException $e) {
            // Affichage d'un message d'erreur si échec de connexion.
            echo $e->getMessage();
        }
    }

    // Fonction statique pour obtenir une instance unique de la classe Model.
    public static function getInstance()
    {
        // Si l'instance n'est pas déjà créée...
        if (self::$instance === null) {
            //créer une nouvelle instance.
            self::$instance = new static();
        }
        // Retourner l'instance unique
        return self::$instance;
    }

    // Fonction pour récupérer tous les enregistrements d'une entité
    public function readAll($entity)
    {
        $query = $this->query('select * from ' . $entity);
        // Retourner les résultats sous forme d'objets de la classe correspondante (PDO et Config).
        return $query->fetchAll(PDO::FETCH_CLASS, Config::ENTITY . ucfirst($entity));
    }

    // Fonction pour récupérer un enregistrement par ID d'une entité ($entity et $id).
    public function getById($entity, $id)
    {
        $query = $this->query('select * from ' . $entity . ' where id=' . $id);
        // Retourner le premier résultat sous forme d'objet de la classe correspondante 5PDO et Config)
        return $query->fetchAll(PDO::FETCH_CLASS, Config::ENTITY . ucfirst($entity))[0];
    }

     // Fonction pour récupérer des enregistrements en fonction d'un attribut et de sa valeur
    public function getByAttribute($table, $attribute, $value, $comp = '=', $select = '*')
    {
        // SELECT * FROM table WHERE attribute = value
         // Construire et exécuter la requête SQL
        $query = $this->query("SELECT ".$select." FROM $table WHERE $attribute $comp '$value'");
                // Retourner les résultats sous forme d'objets de la classe correspondante
        return $query->fetchAll(PDO::FETCH_CLASS, Config::ENTITY . ucfirst($table));
    }

        // Fonction pour enregistrer un nouvel enregistrement dans une entité
    public function save($entity, $datas): void
    {
        $sql = 'INSERT into ' . $entity . ' (';
        $count = count($datas) - 1;
        $preparedDatas = [];
        $i = 0;
        foreach ($datas as $key => $value) {
            $sql .= $key;
            if ($i < $count) {
                $sql = $sql . ',';
            }
            $i++;
        }
        $sql .= ') VALUES (';
        $i = 0;
        foreach ($datas as $data) {

            $preparedDatas[] = htmlspecialchars($data);
            $sql .= "?";
            if ($i < $count) {
                $sql = $sql . ', ';
            }
            $i++;
        }
        $sql = $sql . ')';
        // echo $sql . '<br>';
        // var_dump($preparedDatas);
        // Préparer et exécuter la requête av les données sécurisées
        $preparedRequest = $this->prepare($sql);
        $preparedRequest->execute($preparedDatas);
    }

    // Mettre à jour un enregistrement par ID dans une entité
    public function updateById($entity, $id, $datas): void
    {
        $sql = 'UPDATE ' . $entity . ' SET ';
        $count = count($datas) - 1;
        $preparedDatas = [];
        $i = 0;
        foreach ($datas as $key => $value) {
            $preparedDatas[] = htmlspecialchars($value);
            $sql .= $key . " = ?";
            if ($i < $count) {
                $sql = $sql . ', ';
            }
            $i++;
        }
        $sql = $sql . " WHERE id='$id'";
        // echo $sql . '<br>';
        // var_dump($preparedDatas);
        // Préparer et exécuter la requête avec les données sécurisées
        $preparedRequest = $this->prepare($sql);
        $preparedRequest->execute($preparedDatas);
    }
    //supprimer un enregistrement par ID dans une entité
    public function deleteById($entity, $id): void
    {
        // Construire la requête DELETE SQL et l'exécuter
        $sql = "DELETE from $entity WHERE id = '$id'";
        $this->exec($sql);
    }

        //Récupérer des données de plusieurs entités liées par des jointures
    public function getDataFromEntity(array $datas, $entity, array $joinedEntities)
    {
        /* En rentrant un tableau permet de choisir les entités de sortie */
        $sql = 'SELECT ';
        $count = count($datas)-1;
        $i = 0;
        foreach ($datas as $value) {
            $sql .= htmlspecialchars($value);
            if ($i < $count) {
                $sql .= ', ';
            }
            $i++;
        }
        $i = 0;
        $sql .= ' FROM '.htmlspecialchars($entity);
        $savedEntity = ''; //variable permettant de sauver l'entité precédente afin de faire les jointures
        /* Permet de créer toutes les jointures en fonction du tableau $joinedEntities */
        foreach ($joinedEntities as $joinedEntity) {
            if ($i === 0) {
                // première jointure
                $sql .= ' JOIN '.htmlspecialchars($joinedEntity).' ON '.htmlspecialchars($joinedEntity).'.ID_'.htmlspecialchars(ucfirst($entity)).' = '.htmlspecialchars($entity).'.ID';
                $savedEntity = $joinedEntity;
            } else {
                //jointures suivantes
                $sql .= ' JOIN '.htmlspecialchars($joinedEntity).' ON '.htmlspecialchars($joinedEntity).'.ID_'.htmlspecialchars(ucfirst($savedEntity)).' = '.htmlspecialchars($savedEntity).'.ID';
                $savedEntity = $joinedEntity;
            }
            $i++;
        }
         // Ajoute d'une condition WHERE pour filtrer les résultats par ID
        $sql .= ' WHERE '.htmlspecialchars($savedEntity).'.ID = '.$_GET['id'];
        // Exécuter la requête SQL et retourner les résultats en objets.
        $query = $this->query($sql);
        return $query->fetchAll(PDO::FETCH_CLASS, Config::ENTITY . 'Administrateur');
    }
}