<?php
?>

<DOCTYPE html>
    <html>
       <head>
          <title>Connexion</title>
          <meta charset="utf-8" />
          <link rel="stylesheet" type="text/css" href="formulaire2.css"/>
       </head>
       <body>
          <h1>Connexion</h1>
          <form method="post" action="index_prive.html">
          <div>
             <label for="mail">Mail :<span>*</span></label> 
             <input type="email" name="email" required id="email" placeholder="exemple@orange.fr"/>
          </div>
          <div>
             <label for="password">Mot de passe : <span>*</span></label> 
             <input type="text" name="password" required id="password" placeholder="Votre mot de passe"/>
          </div>
          <div>
             <input type="submit" value="se connecter"/>
          </div>
          <div>
            <input type="submit" value="nouveaux compte"/>
         </div>
       </body>
    </html>