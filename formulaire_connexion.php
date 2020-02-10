<?php
   include('./fonction.php');  //importé toutes les fonctions //
   // Cas où formulaire a été rempli
   if ( isset($_POST) && !empty($_POST) ) {
      $mail = $_POST["email"];
      $password = $_POST["password"];

      $userExist = findUserCSV($mail);

      // Cas où il existe dans notre fichier CSV
      if ($userExist == true) {
         $passwordCSV = getPasswordMail($mail);
         if ($passwordCSV == $password) {
            // Cas du bon mot de passe
            header("Location : ./index_prive.html");
         } else {
            // Cas du mauvais mot de passe
            ?><script>alert("Mauvais Mot de passe");</script><?php
         }
      } else {
         // Cas où il n'existe pas dans notre fichier CSV
         ?><script>alert("Mauvais nom d'utilisateur");</script><?php
      }
   }
?>
<DOCTYPE html>
   <html>

   <head>
      <title>Connexion</title>
      <meta charset="utf-8" />
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
         integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="TP_formulaire.css" />
   </head>

   <body>
      <h1>Connexion</h1>
      <form method="post" action="">
         <!-- ? ramene sur la meme page -->
         <div class="form-group">
            <label for="mail">Mail : <samp>*</samp></label>
            <input type="email" class="form-control" name="email" id="mail" placeholder="name@example.com" required>
         </div>
         <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe" required>
         </div>
         <div class="row">
            <input class="btn btn-secondary col-md-5" type="submit" value="se connecter" />
            <a class="btn btn-primary col-md-5" href="nouveau_compte.php" role="button">Nouveau compte</a>
         </div>
   </body>

   </html>