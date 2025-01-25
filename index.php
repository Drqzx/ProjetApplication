<?php

require_once 'vendor/autoload.php';

use Controllers\simpleController;

function main() {

    $simpleController = new simpleController();
    $simpleController->index();

}

main();