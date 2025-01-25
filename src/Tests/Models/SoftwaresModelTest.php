<?php

namespace Models;

use Models\SoftwaresModel;

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../../vendor/autoload.php';

class SoftwaresModelTest extends TestCase{

    // Test de la méthode getAllSoftwares
    public function testGetAllSoftwares(){
        $softawaresModel = new SoftwaresModel();
        $softwares = $softawaresModel->getAllSoftwares();

        $this->assertIsArray($softwares);
        print_r("Assertion réussie");
    }

    // Test de la méthode getSoftwareById
    public function testGetSoftwareById(){
        $softawaresModel = new SoftwaresModel();
        $software = $softawaresModel->getSoftwareById(1);

        $softwareName = $software->getName();

        $this->assertIsString($softwareName);
        $this->assertEquals("Microsoft Office", $softwareName);
        print_r("Assertion réussie");

    }
}
