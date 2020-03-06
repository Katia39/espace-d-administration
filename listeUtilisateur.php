<?php
    // Permet l'utilisatiob de la variable $__SESSION
    session_start();
    include('./fonction.php'); //importe les fonctions de fonction.php//
    // Vérification qu'on est bien connecté
    isConnecter($_SESSION["connecter"]); // Appel la fonction isConnecter qui vérifie qu'on est bien connecté

    if (isset($_POST) && !empty($_POST)) { //il a remplis le formulaire//
        if(deleteCSV($mail)) {
            // Cas ou on a pu supprimer du contenu
            ?><script>alert("Suppression effectué avec succès");</script><?php
        } else {
            // Cas ou on a pas pu supprimer le contenu
            ?><script>alert("Problème de suppression");</script><?php
        }
    }
?>

<!doctype html>
<html lang="fr">

<head>
    <title>Liste d'utilisateurs</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="TP_formulaire.css" />
</head>

<body>
    <!-- carte css qui affichera les informations proprement. Pour eviter de le copier coller on va faire une boucle-->
    <div class="container">
        <form method="post" class="carte row flex-wrap" action="">
            <?php

            $monCSV = readCSV(); //recupere les info contenu dans le csv//
            $arrayCSV = explode("\n", $monCSV);
            foreach ($arrayCSV as $index => $ligneCSV) {
                $ligneCSVenTableau = explode(";", $ligneCSV);
                ?>
                    <div class="card col-md-4 darken-1">
                        <img style="width: 100%; height: 100px; object-fit: contain;" src="./upload/<?php echo($ligneCSVenTableau[5]) ?>" class="card-img-top" alt="Photo de <?php echo($ligneCSVenTableau[2]." ".$ligneCSVenTableau[1])?>">
                        <div class="card-body">
                            <h5 class="card-title">Nom : <?php echo($ligneCSVenTableau[1]) ?>, Prénom : <?php echo($ligneCSVenTableau[2]) ?></h5>
                            <p class="card-text">Adresse e-mail : <?php echo($ligneCSVenTableau[3]) ?>, Civilité : <?php echo($ligneCSVenTableau[0]) ?>, Mot de passe : <?php echo($ligneCSVenTableau[4]) ?></p>
                            <input type="email" name="email" value="<?php echo($ligneCSVenTableau[3]) ?>">
                            <input type="submit" class="btn btn-primary" value="Supprimer l'utilisateur (pas encore dispo)">
                        </div>
                    </div>
                <?php
            }
        ?>
        </form>
    </div>

</body>

</html>