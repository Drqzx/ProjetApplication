<?php

namespace Classes;

use Config\Database;

require_once __DIR__.'/../../vendor/autoload.php';

class Software{

    private $id;
    private $name;
    private $licence;
    private $version;

    public function __construct($id, $name, $licence, $version)
    {
        $this->id = $id;
        $this->name = $name;
        $this->licence = $licence;
        $this->version = $version;
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getLicence()
    {
        return $this->licence;
    }

    public function setLicence($licence)
    {
        $this->licence = $licence;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function setVersion($version)
    {
        $this->version = $version;
    }
}