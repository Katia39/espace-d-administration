<?php
session_start();

// Fonction qui ouvre le fichier CSV, renvoi une ressource
function openCSV($droit) {
    $ressourceCsv = fopen("./csv/compte.csv", $droit);
    return $ressourceCsv;
}

// Fonction qui permet de fermer le CSV
function closeCSV($droit) {
    fclose($droit);
}

// Fonction qui ajoute dans le fichier CSV
function addCSV($contenu) {
    $ressource = openCSV("a+");
    fwrite($ressource, $contenu);

    if (!fwrite($ressource, $contenu)) {
        echo("Erreur dans l'ajout de contenu");
    }

    closeCSV($ressource);
}

// Fonction qui permet de chercher un contenu
function findCSV($contenu) {
    $csv = readCSV();
    $arrayCSV = explode("\n", $csv);
    // $mesDonnées = array(
    //     'admin@eemi.com' => [
    //         'civilité' => 2,
    //         'nom' => 'Système',
    //         'prenom' => 'Administrateur',
    //         'mail' => 'admin@eemi.com',
    //         'password' => 'password',
    //         'image' => 'photo-administrateur.jpg'
    //     ],
    //     'root@eemi.com' => [
    //         'civilité' => 2,
    //         'nom' => 'Système',
    //         'prenom' => 'Administrateur',
    //         'mail' => 'admin@eemi.com',
    //         'password' => 'password',
    //         'image' => 'photo-administrateur.jpg'
    //     ]
    // );
    $mesDonnées["admin@eemi.com"]["civilité"]
    foreach ($arrayCSV as $key => $value) {
        echo("Ma clé : ".$key.", valeur : ".$value."<br>");
        $newArray = explode(";", $value);
        for ($i = 0; $i < $newArray; $i++) {
            $mesDonnées
        }
    }
}

// Fonction qui permet de supprimer un compte à partir d'un mail
function deleteCSV($mail) {

}

// Fonction qui permet de lire le CSV
function readCSV() {
    $ressource = openCSV("r");
    $csv = fread($ressource, 255);
    return $csv;
}

// Fonction qui permet de voir si tu es inscrit
function connexionCSV($mail, $mdp) {

}

findCSV("salut");