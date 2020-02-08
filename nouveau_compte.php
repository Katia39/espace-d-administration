<?php
?>

<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="UTF-8">
      <link rel="stylesheet" type="text/css" href="formulaire2.css"/>
      <title>Nouveau compte</title>
   </head>
   <body>
      <h1>Nouveau compte</h1>
      <form method="post" action="index_prive.html">
          <div>
         <label for="text">Date du jour : <span>*</span></label> 
         <input type="text" name="date" required id="date" placeholder="AAAA-MM-JJ"/>
        </div>
         <!--pas le bon fichier pour action -->
         <div>
            <!--on peut en selectionner plusieures-->
            <label for="q1">Civilité : </label>
            <input type="radio" name="q1" value="1"/> Madame
            <input type="radio" name="q1" value="2"/> Monsieur
         </div>
         <div>
            <label for="first_name">Prénom : <span>*</span></label> 
            <input type="text" name="first_name" required id="first_name"/>
         </div>
         <div>
            <label for="last_name">Nom de famille : <span>*</span></label> 
            <input type="last_name" name="last_name" required id="last_name"/>
         </div>
         <div>
            <label for="mail">Mail :<span>*</span></label> 
            <input type="email" name="email" required id="email" placeholder="exemple@orange.fr"/>
         </div>
         <div>
            <label for="password">Mot de passe : <span>*</span></label> 
            <input type="text" name="password" required id="password" placeholder="Votre mot de passe"/>
         </div>
         <div>
            <label for="fichier">Importer un fichier (.jpg) :<span>*</span></label>
            <input type="file"
               id="fichier" name="fichier"
               accept="image/jpg">
         </div>
         <div>
            <input type="submit" value="se connecter"/>
         </div>
      </form>
   </body>
</html>