<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de projet</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/formprojet.css">
</head>

<body>
    <header>
    <?php 
        echo '
        <a class="acceuil_formproj" href=?controller=IndexController&method=index>Accueil</a>
        <a class="liste_formproj" href=?controller=ProjetController&method=displayProjets>Liste des projets</a>
        ';
    ?>
    </header>
    <section>
        <li>
            <a>Création de projet</a>
        </li>
        <?php
        echo $form;
        ?>
    </section>
</body>

</html>