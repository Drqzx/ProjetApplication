<?php

// $hardwares -> contient les données des logiciels

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
    <h2>MATERIELS</h2> <!-- Titre dans la bannière -->
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
            <button id="ajouter-btn">Ajouter un matériel</button>
        </div>

        <table>
            <thead>
            <tr>
                <th>Nom</th>
                <th>Type</th>
                <th>Marque</th>
                <th>Model</th>
                <th>Numéro de série</th>
                <th>Option</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach($hardwares as $hardware): ?>
                <tr>
                    <td id="name<?= $hardware->getId() ?>"><?=$hardware->getName()?></td>
                    <td id="type<?= $hardware->getId() ?>"><?= $hardware->getType() ?></td>
                    <td id="brand<?= $hardware->getId() ?>"><?= $hardware->getBrand() ?></td>
                    <td id="model<?= $hardware->getId() ?>"><?= $hardware->getModel() ?></td>
                    <td id="serialNumber<?= $hardware->getId() ?>"><?= $hardware->getSerialNumber() ?></td>
                    <td class="optionContainer">

                        <button onclick="openUpdateContainer(<?= $hardware->getId() ?>)">Modifier</button>

                        <form method="post" action="Hardware/deleteHardware">
                            <input type="hidden" name="id" value="<?= $hardware->getId() ?>">
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
        <form method="post" action="Hardware/insertHardware" id="form-ajout">
            <input type="text" name="name" required autocomplete="off" placeholder="Nom"><br>

            <input type="text" name="type" required autocomplete="off" placeholder="Type"><br>

            <input type="text" name="brand" required autocomplete="off" placeholder="Marque"><br>

            <input type="text" name="model" required autocomplete="off" placeholder="Modèle"><br>

            <input type="text" name="serialNumber" required autocomplete="off" placeholder="Numéro de série"><br>

            <button type="submit">Ajouter</button>
        </form>
    </div>
</div>

<!-- Pop-up pour modifier des ressources -->
<div id="popupUpdate" class="popup">
    <div class="popup-content">
        <span id="closeUpdate" class="close">&times;</span>
        <h3>Modifier logiciel</h3>
        <form method="post" action="Hardware/updateHardware" id="form-update">
            <input type="hidden" id="idUpdate" name="id">

            <input type="text" id="nameUpdate" name="name" required autocomplete="off" placeholder="Nom"><br>

            <input type="text" id="typeUpdate" name="type" required autocomplete="off" placeholder="Type"><br>

            <input type="text" id="brandUpdate" name="brand" required autocomplete="off" placeholder="Marque"><br>

            <input type="text" id="modelUpdate" name="model" required autocomplete="off" placeholder="Modèle"><br>

            <input type="text" id="serialNumberUpdate" name="serialNumber" required autocomplete="off" placeholder="Numéro de série"><br>

            <button type="submit">Modifier</button>
        </form>
    </div>
</div>

<!-- Lien vers le fichier JavaScript -->
<script src="public/JavaScript/HardwareScript.js"></script>
</body>
</html>
