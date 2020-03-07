<?php
   // Permet l'utilisatiob de la variable $__SESSION
   session_start();
   include('./fonction.php'); //importe les fonctions de fonction.php//
   // Vérification qu'on est bien connecté
   isConnecter($_SESSION["connecter"]); // Appel la fonction isConnecter qui vérifie qu'on est bien connecté

//ctrl shift 
if(isset( $_POST["nom"])){
    $nom = $_POST["nom"];
    $minuscules = strtolower($nom);
       if (strpos($nom," ") !== false)
  {
    $probleme="Les espaces sont interdits";
  }
}
if(isset( $_POST["nom"]) & isset($_POST["titre"]) & isset($_POST["h1"])){
    fopen($nom.".html","x+");
    $open=fopen($nom.".html", "x+");
    $titre=$_POST["titre"];
    $h1=$_POST["h1"];
    $main=$_POST["main"];
    fwrite($open,"<DOCTYPE html><html><head><title>".$nom."</title><meta charset=\"utf-8\"/></head><body>
    <h1>".$h1."</h1><main>".$main."</main></body></html>");
    fclose($open);
}?>
<DOCTYPE html>
   <html>

   <head>
      <meta charset="utf-8" />
      <title>Page HTML</title>
       <script src="https://cdn.tiny.cloud/1/zw3yblwmhk4wj20lto4p00dnaciaahrmunehx2eo4kk2iqld/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <link rel="stylesheet" type="text/css" href="TP_formulaire.css" />
        </head>

   <body>
     <?php
  if (isset($probleme)){
    echo("<p>".$probleme."</p>");
  }
  ?>
      <h1>Formulaire d'une page HTML</h1>
      <form method="post" action= "resultat.php">
         <div>
            <label for="nom">Nom du fichier : <span>*</span></label>
            <input type="text" name="nom" required id="nom" />
         </div>
         <div>
            <label for="titre">Titre : <span>*</span></label>
            <input type="text" name="titre" required id="titre" />
         </div>
         <div>
            <label for="h1">H1 : <span>*</span></label>
            <input type="text" name="h1" required id="h1" />
         </div>
         <div>
          <label for="main">Main<span>*</span></label>
        <textarea name="main" requiered id="main"></textarea>
<script>
    tinymce.init({
    selector: 'textarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_drawer: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
    });
  </script>
</div>
<div class="row justify-content-between">
            <input class="btn btn-secondary bouton-submit col-md-12" type="submit" value="créer" />
         </div>
   </body>

</html>