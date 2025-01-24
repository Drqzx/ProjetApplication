<?php

use Config\Database;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../../vendor/autoload.php';

class DatabaseTest extends TestCase
{

    // Test if the connection is not null
    public function testGetConnection()
    {
        $database = new Database();
        $this->assertNotNull($database->getConnection());
    }
}
