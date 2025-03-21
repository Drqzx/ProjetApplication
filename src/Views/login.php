<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="public/CSS/global.css">
  <link rel="stylesheet" href="public/CSS/login.css">
  <title>Ressources Numériques</title>
</head>
<body>
<div></div>
    <h2>Se connecter</h2>

  </div>
  
  <div>
    <form method="POST" action="Login/verifyUser">
      <input type="text" name="username" placeholder="Username" required>

      <input type="password" name="password" id="password" placeholder="password" required>

      <button type="submit">Se connecter</button>
    </form>
  </div>

  <!-- Lien vers le fichier JavaScript -->
  <script src="script.js"></script>
</body>
</html>