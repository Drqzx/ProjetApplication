<?php

use Classes\Software;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../../vendor/autoload.php';

class SoftwareTest extends TestCase
{
    private $software;

    protected function setUp(): void
    {
        $this->software = new Software(1, 'windows', 'proprietary', '2016');
    }
    public function testGetId()
    {
        $this->assertEquals(1, $this->software->getId());
    }

    public function testSetId()
    {
        $this->software->setId(2);
        $this->assertEquals(2, $this->software->getId());
    }

    public function testGetName()
    {
        $this->assertEquals('windows', $this->software->getName());
    }

    public function testSetName()
    {
        $this->software->setName('linux');
        $this->assertEquals('linux', $this->software->getName());
    }

    public function testGetLicence()
    {
        $this->assertEquals('proprietary', $this->software->getLicence());
    }

    public function testSetLicence()
    {
        $this->software->setLicence('open source');
        $this->assertEquals('open source', $this->software->getLicence());
    }

    public function testGetVersion()
    {
        $this->assertEquals('2016', $this->software->getVersion());
    }

    public function testSetVersion()
    {
        $this->software->setVersion('2020');
        $this->assertEquals('2020', $this->software->getVersion());
    }
}
