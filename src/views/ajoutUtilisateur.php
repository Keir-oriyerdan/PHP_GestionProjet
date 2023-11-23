<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de projet</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/formuser.css">
    <link rel="stylesheet" href="./css/style.css"> 
</head>
<body>
    <header>
        <?php
        echo '<li><a href=?controller=IndexController&method=index>Accueil</a></li>';
        ?>
    </header>
    <section>
        <li><a>Ajouter un utilisateur</a></li>
        <?php
        echo $form;
        ?>
    </section>
</body>
</html>
