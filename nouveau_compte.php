<?php
   session_start();
   include('./fonction.php');  //importé toutes les fonctions //
   // Traitement du formulaire
   // Cas où formulaire a été rempli avec un post
   if ( isset($_POST) && !empty($_POST) ) {

      // On récupère la civilité
      if ($_POST["civilite"] == 1 || $_POST["civilite"] == 2) {    //pour eviter d'etre hacker verifier l'integrité//
         $civilite = $_POST["civilite"] ;
      } else {
         ?><script>alert("Pas le bo format pour la civilité");</script><?php
      }

      // On récupère le nom de famille
      if ($_POST["last_name"] != "" && !is_numeric($_POST["last_name"]) ) {
         $last_name = $_POST["last_name"];
      } else {
         ?><script>alert("Pas le bon format pour le nom de famille");</script><?php
      }

      // On récupère le prénom
      if ($_POST["first_name"] != "" && !is_numeric($_POST["last_name"]) ) {
         $first_name = $_POST["first_name"];
      } else {
         ?><script>alert("Pas le bon format pour le prénom");</script><?php
      }

      // On récupère le mail
      if ($_POST["email"] != "" && filter_var($_POST["email"],FILTER_VALIDATE_EMAIL) ) {
         $email = $_POST["email"];
      } else {
         ?><script>alert("Pas le bon format pour le mail");</script><?php
      }

      // On récupère le mot de passe
      if (verif_mdp($_POST["password"])) {
         $password = $_POST["password"];
      } else {
         ?><script>alert("Pas le bon format pour le mot de passe");</script><?php
      }

      // Récupérer l'image
      // Code pris de : https://phpcodeur.net/articles/php/upload
      if ($_FILES["fichier"] != "" && isset($last_name)) {
         $content_dir = 'upload/'; // dossier où sera déplacé le fichier image

         $tmp_file = $_FILES['fichier']['tmp_name'];//*tmp_file est un fichier qui continet la photo qui sera utiliser pour déplacer l'image//

         if ($_FILES['fichier']['error'] == 1) {
            exit("Le fichier est trop lourd");
         }

         if( !is_uploaded_file($tmp_file) )
         {
            exit("Le fichier est introuvable");
         }

         // on vérifie maintenant l'extension
         $type_file = $_FILES['fichier']['type'];
         if( !strstr($type_file, 'jpg') &&  !strstr($type_file, 'jpeg') ) // verifier que la photo est .jpg
         {
            exit("Le fichier n'est pas un .jpg");
         }

         // on copie le fichier dans le dossier de destination
         $image = "photo-".strtolower($last_name).".jpg";//nom du fichier//

         if( !move_uploaded_file($tmp_file, $content_dir . $image) ) //move_upload_file deplace le fichier temporaire dans notre dossier upload(fichier qui heberge les images)//
         {
            exit("Impossible de copier le dossier dans $content_dir");
         }
      }

      // Controler que chaque variable existe bien et n'est pas vide
      if (isset($civilite) && isset($last_name) && isset($first_name) && isset($email) && isset($password) && isset($image)) {
         $contenu = "\n".$civilite.";".$last_name.";".$first_name.";".$email.";".$password.";".$image;
      }

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
   <form method="post" action="?" enctype="multipart/form-data">  <!--enctype = le formulaire envoie aussi des images      ?= ramener sur la meme page -->
      <!--pas le bon fichier pour action -->
      <div>
         <!--on peut en selectionner plusieures-->
         <label for="q1">Civilité : <span>*</span></label>
         <input type="radio" name="civilite" value="1" /> Madame
         <input type="radio" name="civilite" value="2" /> Monsieur
      </div>
      <div>
         <label for="first_name">Prénom : <span>*</span></label>
         <input type="text" name="first_name" required id="first_name" />
      </div>
      <div>
         <label for="last_name">Nom de famille : <span>*</span></label>
         <input type="text" name="last_name" required id="last_name" />
      </div>
      <div>
         <label for="mail">Mail :<span>*</span></label>
         <input type="email" name="email" required id="email" placeholder="exemple@orange.fr" />
      </div>
      <div>
         <label for="password">Mot de passe <small>8 caractères, au moins un chiffre, une minuscule, une majuscule et un caractère spécial </small> : <span>*</span></label>
         <input type="text" name="password" required id="password" placeholder="Votre mot de passe" />
      </div>
      <div>
         <label for="fichier">Importer un fichier (.jpg) :<span>*</span></label>
         <input type="file" id="fichier" name="fichier" accept="image/jpg" required>
      </div>
      <div>
         <input type="submit" value="s'inscrire" />
      </div>
   </form>
</body>

<!-- Recuperer l'image et la mettre dans notre serveur (tp formulaire)-->

<!-- afficher des differents comptes administrateurs avec leurs photo
On va devoir utiliser la fonction function getDataCSV() pour afficher toutes les données du csv mais je ne sais pas si ca va afficher les images
-->

</html>