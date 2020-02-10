<?php
   include('./fonction.php');  //importé toutes les fonctions //
   // Traitement du formulaire
   // Cas où formulaire a été rempli
   if ( isset($_POST) && !empty($_POST) ) {
      // On récupère la civilité
      if ($_POST["civilite"] == 1 || $_POST["civilite"] == 2) {    //pour eviter d'etre hacker verifier l'integrité//
         $civilite = $_POST["civilite"] ;
      }

      // On récupère le nom de famille
      if ($_POST["last_name"] != "" && preg_match("[a-zA-Z]" , $_POST["last_name"]) ) {
         $last_name = $_POST["last_name"];
      }

      // On récupère le prénom
      if ($_POST["first_name"] != "" && preg_match("[a-zA-Z]" , $_POST["first_name"]) ) {
         $first_name = $_POST["first_name"];
      }

      // On récupère le mail
      if ($_POST["email"] != "" && filter_var($_POST["email"],FILTER_VALIDATE_EMAIL) ) {
         $email = $_POST["email"];
      }

      // On récupère le mot de passe
      if (verif_mdp($_POST["password"])) {
         $password = $_POST["password"];
      }

      // Récupérer l'image

      $image = $_POST["image"];
      if( isset($_POST['upload']) ) // si formulaire soumis
{
    $content_dir = 'upload/'; // dossier où sera déplacé le fichier

    $tmp_file = $_FILES['fichier']['tmp_name'];

    if( !is_uploaded_file($tmp_file) )
    {
        exit("Le fichier est introuvable");
    }

    // on vérifie maintenant l'extension
    $type_file = $_FILES['fichier']['type'];

    if( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif') )
    {
        exit("Le fichier n'est pas une image");
    }

    // on copie le fichier dans le dossier de destination
    $name_file = $_FILES['fichier']['name'];

    if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
    {
        exit("Impossible de copier le fichier dans $content_dir");
    }

    echo "Le fichier a bien été uploadé";
}



      // Controler que chaque variable existe bien et n'est pas vide

      $contenu = "\n".$civilite.";".$last_name.";".$first_name.";".$email.";".$password.";".$image;

      if(addCSV($contenu)) {
         // Cas ou on a pu ajouter du contenu
         ?><script>alert("Ajouter effectué avec succès");</script><?php
      } else {
         // Cas ou on a pas pu ajouter le contenu
         ?><script>alert("Problème d'ajout");</script><?php
      }
   }


?>

<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" type="text/css" href="TP_formulaire.css" />
   <title>Nouveau compte</title>
</head>

<body>
   <h1>Nouveau compte</h1>
   <form method="post" action="index_prive.html" enctype="multipart/form-data">  <!--enctype = le formulaire envoie aussi des images -->
      <!--pas le bon fichier pour action -->
      <div>
         <!--on peut en selectionner plusieures-->
         <label for="q1">Civilité : </label>
         <input type="radio" name="civilite" value="1" /> Madame
         <input type="radio" name="civilite" value="2" /> Monsieur
      </div>
      <div>
         <label for="first_name">Prénom : <span>*</span></label>
         <input type="text" name="first_name" required id="first_name" />
      </div>
      <div>
         <label for="last_name">Nom de famille : <span>*</span></label>
         <input type="last_name" name="last_name" required id="last_name" />
      </div>
      <div>
         <label for="mail">Mail :<span>*</span></label>
         <input type="email" name="email" required id="email" placeholder="exemple@orange.fr" />
      </div>
      <div>
         <label for="password">Mot de passe : <span>*</span></label>
         <input type="text" name="password" required id="password" placeholder="Votre mot de passe" />
      </div>
      <div>
         <label for="fichier">Importer un fichier (.jpg) :<span>*</span></label>
         <input type="file" id="fichier" name="fichier" accept="image/jpg">
      </div>
      <div>
         <input type="submit" value="se connecter" />
      </div>
   </form>
</body>

</html>