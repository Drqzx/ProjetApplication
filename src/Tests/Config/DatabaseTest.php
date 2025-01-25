<?php

use Config\Database;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../../vendor/autoload.php';

class DatabaseTest extends TestCase
{


    public function testGetConnection()
    {
        $database = new Database();
        $this->assertNotNull($database->getConnection());
    }
}
