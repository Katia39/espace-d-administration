<?php
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
<DOCTYPE hmtl>
<html>
<head>
<meta charset ="utf-8" />
<title>Page HTML</title>
</head>
<body>
	<h1>Formulaire d'un page HTML</h1>
 <form method="post" action="A VOIR.html">
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

<!--Il faut qu'il execute la commande quand on appuie sur le bouton :thniking:-->
<?php
$opening = "test.php";
$cequilfautecrire = echo("<DOCTYPE hmtl><html><head><meta charset ="utf-8" />
<title><?php $_POST["titre"];?></title></head><body><h1><?php $_POST["h1"];?>
</h1></body></html>");
fopen($opening,"r");
fwrite($opening, $cequilfautecrire);
fclose($pening);
?>

</html>
