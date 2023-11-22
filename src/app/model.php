<?php

namespace Madmax\Skrrr\app;

use PDO;
use Madmax\Skrrr\config\Config;

class Model extends PDO
{
    private static $instance = null;

    private function __construct()
    {
        try {
            parent::__construct(
                "mysql:dbname=" . Config::DBNAME . ";host=" . Config::DBHOST,
                Config::DBUSER,
                Config::DBPWD
            );
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new static();
        }
        return self::$instance;
    }
    
    public function readAll($entity)
    {
        $query = $this->query('select * from ' . $entity);
        return $query->fetchAll(PDO::FETCH_CLASS, Config::ENTITY . ucfirst($entity));
    }

    public function getById($entity, $id)
    {
        $query = $this->query('select * from ' . $entity . ' where id=' . $id);
        return $query->fetchAll(PDO::FETCH_CLASS, Config::ENTITY . ucfirst($entity))[0];
    }

    public function getByAttribute($entity, $attribute, $value, $comp = '=')
    {
        // SELECT * FROM table WHERE attribute = value
        $query = $this->query("SELECT * FROM $entity WHERE $attribute $comp '$value'");
        return $query->fetchAll(PDO::FETCH_CLASS, Config::ENTITY . ucfirst($entity));
    }

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
        $preparedRequest = $this->prepare($sql);
        $preparedRequest->execute($preparedDatas);
    }

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
        $preparedRequest = $this->prepare($sql);
        $preparedRequest->execute($preparedDatas);
    }

    public function deleteById($entity, $id): void
    {
        $sql = "DELETE from $entity WHERE id = '$id'";
        $this->exec($sql);
    }

    public function getProjetAdmins()
    {
        $sql = "SELECT * FROM projet JOIN administrateur ON projet.ID_Administrateur = administrateur.ID
        JOIN utilisateur ON administrateur.ID_Utilisateur = utilisateur.ID
        WHERE administrateur.ID_Utilisateur = ".$_SESSION['ID'];
        $preparedRequest = $this->prepare($sql);
        return $this->exec($preparedRequest);
    }

    public function readAllAdmin()
    {
        $sql = "SELECT utilisateur.Nom, utilisateur.Prenom FROM administrateur JOIN utilisateur ON administrateur.ID_Utilisateur = utilisateur.ID";
        $preparedRequest = $this->prepare($sql);
        return $this->exec($preparedRequest);
    }

    public function getAdminByProjet()
    {
        $sql = 'SELECT utilisateur.Nom, utilisateur.Prenom FROM utilisateur 
        JOIN administrateur ON administrateur.ID_Utilisateur = utilisateur.ID
        JOIN projet ON projet.ID_Administrateur = administrateur.ID 
        WHERE projet.ID = '.$_GET['id'];
        $preparedRequest = $this->prepare($sql);
        return $this->exec($preparedRequest);
    }

    public function getPrioriteFromTache()
    {
        $sql = 'SELECT priorite.Niveau_Priorite FROM priorite 
        JOIN tache ON tache.ID_Priorite = priorite.ID 
        WHERE tache.ID = '.$_GET['id'];
        $preparedRequest = $this->prepare($sql);
        return $this->exec($preparedRequest);
    }

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
                $sql .= ' JOIN '.htmlspecialchars($joinedEntity).' ON '.htmlspecialchars($joinedEntity).'.ID_'.htmlspecialchars(ucfirst($entity)).' = '.htmlspecialchars($entity).'.ID';
                $savedEntity = $joinedEntity;
            } else {
                $sql .= ' JOIN '.htmlspecialchars($joinedEntity).' ON '.htmlspecialchars($joinedEntity).'.ID_'.htmlspecialchars(ucfirst($savedEntity)).' = '.htmlspecialchars($savedEntity).'.ID';
                $savedEntity = $joinedEntity;
            }
            $i++;
        }
        $sql .= ' WHERE '.htmlspecialchars($savedEntity).'.ID = '.$_GET['id'];
        $query = $this->query($sql);
        return $query->fetchAll(PDO::FETCH_CLASS, Config::ENTITY . 'Administrateur');
    }
}