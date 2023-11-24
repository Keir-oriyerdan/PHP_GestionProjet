<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de projet</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/users.css">
    <link rel="stylesheet" href="./css/style.css"> 
</head>
<body>
    <header>
        <?php
        echo '<li><a href=?controller=IndexController&method=index>Accueil</a></li>';
        ?>
    </header>
    <section>
        <li>
            <a>Liste des utilisateurs</a>
        </li>
        <?php
        // parcourir la liste d'users
        //& afficher des liens pour afficher/mettre à jour/supprimer chaque user. 
        foreach ($utilisateurs as $key => $utilisateur) {
            echo '<li class="userlist">
                    <a href=?controller=UtilisateurController&method=displayUtilisateur&id='.$utilisateur->getID().'>'.$utilisateur->getNom().' '.$utilisateur->getPrenom().'</a>
                    <a href=?controller=UtilisateurController&method=updateUtilisateur&id='.$utilisateur->getID().'>Modifier</a>
                    <a href=?controller=UtilisateurController&method=supprimerUtilisateur&id='.$utilisateur->getID().'>Supprimer</a>
                </li>';
        }
        ?>
    </section>
</body>
</html>