<?php
   // Permet l'utilisatiob de la variable $__SESSION
   session_start();
   include('./fonction.php'); //importe les fonctions de fonction.php//
   // Vérification qu'on est bien connecté
   isConnecter($_SESSION["connecter"]); // Appel la fonction isConnecter qui vérifie qu'on est bien connecté

//ctrl shift 
   function nomfichier()
   {
      $_POST["nom"]=$nom;
      if (strpos($nom," ") !== false)
      {
         return("Espaces interdits");
      }
      // Après faut faire en sorte que les caractères spéciaux soient interdits, mais je ne sais plus avec quoi :thinking://
   }

?>
<DOCTYPE html>
   <html>

   <head>
      <meta charset="utf-8" />
      <title>Page HTML</title>
   </head>

   <body>
      <h1>Formulaire d'un page HTML</h1>
      <form method="post" action="">
         <div>
            <label for="nom">Nom du fichier : <span>*</span></label>
            <input type="text" name="nom" required id="nom" />
         </div>
         <div>
            <label for="titre">Titre : <span>*</span></label>
            <input type="text" name="titre" required id="titre" />
         </div>
         <div>
            <label for="description">Description : <span>*</span></label>
            <input type="text" name="description" required id="description" />
         </div>
         <div>
            <label for="h1">H1 : <span>*</span></label>
            <input type="text" name="h1" required id="h1" />
         </div>
   </body>


   <!--Il faut qu'Mil execute la commande quand on appuie sur le bouton :thniking:-->
   <?php
   function formulaire(){
      $opening = "test.php";
      $cequilfautecrire = "<DOCTYPE hmtl><html><head><meta charset =\"utf-8\" />
      <title>".$_POST["TITRE"]."</title>
         </head>

         <body>
            <h1>".$_POST["h1"]."</h1> 
         </body>

         </html>"; //pas obligé de reouvrir le php, on peut concatener//
         fopen($opening,"r");
         fwrite($opening, $cequilfautecrire);
         fclose($opening);
};

   ?>
   <input type="submit" name="envoyer" value="envoyer" onclick="formulaire();"> <!--tu peux pas utiliser onclick="formulaire"   si tu utilise des formules utiliser dans formulaire.php     il faut que tu redirige l'utilisateur sur la meme page-->
   </body>

</html>