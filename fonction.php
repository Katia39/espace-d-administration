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

// Fonction qui permet de chercher une personne via son mail
function findUserCSV($mail) {
    $data = getDataCSV();
    $userExist = false;

    foreach ($data as $key => $value) {
        if (!empty($value[$mail])) {
            $userExist = true;
        }
    }

    return $userExist;
}

// Fonction qui permet de voir le mot de passe d'une personne via son mail
function getPasswordMail($mail) {
    $dataUser = getDataUserCSV($mail);

    $password = $dataUser["password"];

    return $password;
}

// Fonction qui récupère les données d'une personne via son mail
function getDataUserCSV($mail) {
    $data = getDataCSV();

    foreach ($data as $key => $value) {
        if (!empty($value[$mail])) {
            $dataUser = $value[$mail];
        }
    }

    return $dataUser;
}

// Fonction qui permet d'avoir dans un tableau toutes les données du CSV
function getDataCSV() {
    $csv = readCSV();
    $arrayCSV = explode("\n", $csv);
    $mesDonnees = array();
    foreach ($arrayCSV as $key => $value) {
        // echo("Ma clé : ".$key.", valeur : ".$value."<br>");
        $newArray = explode(";", $value);
        $mesDonnees[] = array( $newArray[3] => array(
            "civilite" => $newArray[0], 
            "nom" => $newArray[1],
            "prenom" => $newArray[2],
            "mail" => $newArray[3],
            "password" => $newArray[4],
            "image" => $newArray[5]
            )
        );
        //mesDonnees = tableau qui contient les données final      value = données dans le csv    newArray = une ligne du csv tableau qui contient les données//
    }

    return $mesDonnees;
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

// Fonction qui permet verifier le mot de passe
function verif_mdp($mdp) {
    $tableau = array("0","1","2","3","4","5","6","7","8","9");
    $test = 0;
    foreach ($tableau as $chiffre) {
        if(strpos($mdp,$chiffre) !== false) {
            $test = 1;
        }
    }
    if (strlen($mdp) < 4){
        return(false);
    }
    elseif($test == 0) {
        return (false);
    }
    elseif (is_numeric($mdp)) {
        return(false);
    }
    elseif (strtolower($mdp) == $mdp) {
        return(false);
    }
    elseif (strtoupper($mdp) == $mdp) {
        return(false);
    }
    else {
        return(true);
    }

}