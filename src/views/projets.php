<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de projet</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/projets.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header>
    <?php 
    echo '<li><a href=?controller=IndexController&method=index>Accueil</a></li>';
    ?>
        <?php
        echo '<a href=?controller=IndexController&method=index>Accueil</a><br>';
        ?>
    </header>
    <section>
        <?php
        // affichage des différents projets
        foreach ($projets as $key => $projet) {
            echo '<li class="projectlist">
        Projets: 
        <a href=?controller=ProjetController&method=displayProjet&id=' . $projet->getID() . '>' . $projet->getNom() . '</a>
        <a href=?controller=ProjetController&method=updateProjet&id=' . $projet->getID() . '>Modifier</a>  
        <a href=?controller=ProjetController&method=supprimerProjet&id=' . $projet->getID() . '>Supprimer</a>
        </li>';
        }
        ?>
        <a href="?controller=ProjetController&method=ProjetForm"><button type="button">Crée un Projet</button></a>
    </section>
</body>

</html>