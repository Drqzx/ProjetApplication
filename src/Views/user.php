<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/CSS/global.css">
  <link rel="stylesheet" href="public/CSS/user.css">
  <title>Ressources Numériques</title>
</head>
<body>

  <!-- Bannière horizontale en haut -->
  <div id="banniere-bordure">
    <h2>USERS</h2> <!-- Titre dans la bannière -->
  </div>
  
  <!-- Conteneur principal pour la bannière verticale et la grosse div -->
  <div id="conteneur-principal">
    <!-- Bannière verticale avec boutons -->
    <div id="banniere-verticale">
      <a href="Dashboard">ACCUEIL</a>
      <a href="Hardware">MATERIELS</a>
      <a href="Software">LOGICIELS</a>
      <a href="Login/Logout">DECONNEXION</a>
    </div>

    <div id="grosse-div">
        <h2>Gestion des utilisateurs</h2>
        <p>Nom d'utilisateur : <?= $actualUser->getUsername()?></p>
        <p>Mot de passe : <?=$actualUser->getPassword()?></p>
    </div>
    
    

</body>
</html>
