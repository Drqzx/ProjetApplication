<?php

 // $softwares -> contient les données des logiciels

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="public/CSS/global.css">
  <link rel="stylesheet" href="public/CSS/software.css">
  <title>Ressources Numériques</title>
</head>
<body>

  <!-- Bannière horizontale en haut -->
  <div id="banniere-bordure">
    <h2>LOGICIELS</h2> <!-- Titre dans la bannière -->
  </div>
  
  <!-- Conteneur principal pour la bannière verticale et le tableau -->
  <div id="conteneur-principal">
    <!-- Bannière verticale avec boutons -->
    <div id="banniere-verticale">
      <a href="Hardware">MATERIELS</a>
      <a href="Software">LOGICIELS</a>
      <a href="User">UTILISATEUR</a>
      <a href="Login/Logout">DECONNEXION</a>
    </div>

    <!-- Espace à droite avec tableau et bouton d'ajout -->
    <div id="tableau">
      <!-- Bouton Ajouter des données -->
      <div id="ajouter-donnees">
        <button id="ajouter-btn">Ajouter un logiciel</button>
      </div>
      
      <table>
        <thead>
          <tr>
            <th>Nom</th>
            <th>Licence</th>
            <th>Version</th>
            <th>Option</th>
          </tr>
        </thead>
        <tbody>

        <?php foreach($softwares as $software): ?>
          <tr>
            <td id="name<?= $software->getId() ?>"><?=$software->getName()?></td>
            <td id="licence<?= $software->getId() ?>"><?= $software->getLicence() ?></td>
            <td id="version<?= $software->getId() ?>"><?= $software->getVersion() ?></td>
            <td class="optionContainer">

                <button onclick="openUpdateContainer(<?= $software->getId() ?>)">Modifier</button>

                <form method="post" action="Software/deleteSoftware">
                    <input type="hidden" name="id" value="<?= $software->getId() ?>">
                    <button>Supprimer</button>
                </form>
            </td>
          </tr>
        <?php endforeach; ?>

        </tbody>
      </table>
    </div>
  </div>

  <!-- Pop-up pour ajouter des ressources -->
  <div id="popup" class="popup">
    <div class="popup-content">
      <span id="close" class="close">&times;</span>
      <h3>Ajouter un logiciel</h3>
      <form method="post" action="Software/insertSoftware" id="form-ajout">
        <input type="text" name="name" required autocomplete="off" placeholder="Nom"><br>
        
        <input type="text" name="licence" required autocomplete="off" placeholder="Licence"><br>
        
        <input type="text" name="version" required autocomplete="off" placeholder="Version"><br>

        <button type="submit">Ajouter</button>
      </form>
    </div>
  </div>

  <!-- Pop-up pour modifier des ressources -->
  <div id="popupUpdate" class="popup">
      <div class="popup-content">
          <span id="closeUpdate" class="close">&times;</span>
          <h3>Modifier logiciel</h3>
          <form method="post" action="Software/updateSoftware" id="form-update">
              <input type="hidden" id="idUpdate" name="id">

              <input type="text" id="nameUpdate" name="name" required autocomplete="off" placeholder="Nom"><br>

              <input type="text" id="licenceUpdate" name="licence" required autocomplete="off" placeholder="Licence"><br>

              <input type="text" id="versionUpdate" name="version" required autocomplete="off" placeholder="Version"><br>

              <button type="submit">Modifier</button>
          </form>
      </div>
  </div>

  <!-- Lien vers le fichier JavaScript -->
  <script src="public/JavaScript/script.js"></script>
</body>
</html>
