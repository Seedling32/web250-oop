<?php

class Vehicle
{
  public $make;
  public $model;
  public $year;
  private $classification = 'Unclassified';
  protected $tires = 4;
  public $wheelDrive = 'rear';

  public function set_classification($value)
  {
    $this->classification = $value;
  }

  public function displayVehicle()
  {
    echo "<h2>{$this->model}</h2>
    <h3>Properties:</h3>
    Make: {$this->make}<br>
    Model: {$this->model}<br>
    Year: {$this->year}<br>
    Classification: {$this->classification}<br>
    # of Tires: {$this->tires}<br>
    Wheel Drive: {$this->wheelDrive}<br>";
  }
}

class Truck extends Vehicle
{
  private $bedLength = 0.0;
  private $isMover = true;

  public function set_bedLength($value)
  {
    $this->bedLength = floatval($value);
  }

  public function get_bedLength()
  {
    return $this->bedLength . " ft";
  }

  public function set_isMover($boolean)
  {
    $this->isMover = $boolean;
  }

  public function displayTruck()
  {
    parent::displayVehicle();
    echo "Bed Length: " . $this->get_bedLength() . "<br>
    For Moving? ";
    if ($this->isMover) {
      echo "Yes, move away!";
    } else {
      echo "Not for moving.";
    }
    echo "<br>";
  }
}

class Car extends Vehicle
{
  protected $isConvertible = false;

  public function set_convertible($boolean)
  {
    $this->isConvertible = $boolean;
  }

  public function displayCar()
  {
    parent::displayVehicle();
    echo "Convertible? ";
    if ($this->isConvertible) {
      echo "Yes";
    } else {
      echo "No";
    }
    echo "<br>";
  }
}

class SportsCar extends Car
{
  public $isRacing = true;

  public function displayCar()
  {
    parent::displayCar();
    echo "For Racing? ";
    if ($this->isRacing) {
      echo "Yes";
    } else {
      echo "No";
    }
    echo "<br>";
  }
}

echo "<h1>Assignment 02 Inheritance";

$colorado = new Truck;
$colorado->set_classification('pick-up truck');
$colorado->make = 'Chevy';
$colorado->model = 'Colorado';
$colorado->year = 2014;
$colorado->set_bedLength(8);
$colorado->set_isMover(false);

$frontier = new Truck;
$frontier->set_classification('pick-up truck');
$frontier->make = 'Nissan';
$frontier->model = 'Frontier';
$frontier->year = 2012;
$frontier->set_bedLength(6);

$camry = new Car;
$camry->make = 'Toyota';
$camry->model = 'Camry';
$camry->year = '2020';
$camry->set_classification('Sedan');
$camry->wheelDrive = 'front';

$supra = new SportsCar;
$supra->set_classification('coupe');
$supra->make = 'Toyota';
$supra->model = 'Supra';
$supra->year = '1993';
$supra->set_convertible(true);

$colorado->displayTruck();
echo "<hr>";
$frontier->displayTruck();
echo "<hr>";
$camry->displayCar();
echo "<hr>";
$supra->displayCar();
echo "<hr>";
