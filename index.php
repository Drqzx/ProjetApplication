<?php

require_once 'vendor/autoload.php';

use Router\Router;

$router = new Router();

// Démarrage de la session
session_start();

// Récupérer l'URL demandée
$url = $_GET['url'] ?? ''; // Récupérer 'url' dans les paramètres GET (exemple : /controller/method/params)

// Initialiser et exécuter le routeur
$router = new Router();
$router->route($url);