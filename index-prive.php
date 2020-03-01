<?php
    // Permet l'utilisatiob de la variable $__SESSION
    session_start();
    include('./fonction.php'); //importe les fonctions de fonction.php//
    // Vérification qu'on est bien connecté
    isConnecter($_SESSION["connecter"]); // Appel la fonction isConnecter qui vérifie qu'on est bien connecté
?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <a href="./listeUtilisateur.php" class="btn btn-primary col-md-12 mt-5">Liste des utilisateurs</a>
            <a href="./resultat.php" class="btn btn-primary col-md-12 mt-5">Formulaire de création d'une page HTML</a>
        </div>
    </div>

</body>

</html>