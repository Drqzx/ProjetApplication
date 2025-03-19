<?php

namespace Classes;

require_once __DIR__.'/../../vendor/autoload.php';

class Hardware{

    private $id;
    private $name;
    private $type;
    private $brand;
    private $model;
    private $serialNumber;

    public function __construct($id, $name, $type, $brand, $model, $serialNumber)
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->brand = $brand;
        $this->model = $model;
        $this->serialNumber = $serialNumber;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type): void
    {
        $this->type = $type;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function setBrand($brand): void
    {
        $this->brand = $brand;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model): void
    {
        $this->model = $model;
    }

    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    public function setSerialNumber($serialNumber): void
    {
        $this->serialNumber = $serialNumber;
    }



}