<?php

use Madmax\Skrrr\app\Model;

echo '<a href=http://localhost/PHP_GestionProjet/>Accueil</a><br>';

class ProjetForm
{

    public static function createForm($action, $mode = 'create', $id = 0)
    {
        if ($mode === 'update') {
            $projet = Model::getInstance()->getById('Projet', $id);
            return self::formUpdate($action, $projet);
        }
        return self::form($action);
    }

    public static function form($action)
    {
        $form = "<form action = $action method='POST'>
                <label for='titre'>Titre</label>
                <input id='titre' type='text' name='titre'>
                <label for='genre'>Genre</label>
                <input id='genre' type='text' name='genre'>
                <label for='categorie'>Categorie</label>
                <input id='categorie' type='text' name='categorie'>
                <label for='id_auteur'>Auteur</label>
                <input id='id_auteur' type='number' name='id_auteur'>
                <label for='id_editeur'>Editeur</label>
                <input id='id_editeur' type='number' name='id_editeur'>
                <button name='submit' value='submit'>submit</button>
            </form>";
        return $form;
    }

    public static function formUpdate($action, $projet)
    {
        $form = "<form action = $action method='POST'>
                <input id='id' name='id' value='" . $projet->getId() . "' style='display:none'>
                <label for='titre'>Titre</label>
                <input id='titre' type='text' name='titre' value ='" . $projet->getTitle() . "'>
                <label for='genre'>Genre</label>
                <input id='genre' type='text' name='genre' value ='" . $projet->getGenre() . "'>
                <label for='categorie'>Categorie</label>
                <input id='categorie' type='text' name='categorie' value ='" . $projet->getCategorie() . "'>
                <label for='id_auteur'>Auteur</label>
                <input id='id_auteur' type='number' name='id_auteur' value ='" . $projet->getId_auteur() . "'>
                <label for='id_editeur'>Editeur</label>
                <input id='id_editeur' type='number' name='id_editeur' value ='" . $projet->getId_editeur() . "'>
                <button name='submit' value='submit'>submit</button>
            </form>";
        return $form;
    }
}