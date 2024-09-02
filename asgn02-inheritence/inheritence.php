<?php

class Vehicle
{
  public $make;
  public $model;
  public $year;
<<<<<<< HEAD
  public $classification;
  public $tires = 4;
  public $wheelDrive = 'rear';

=======
  private $classification = 'Unclassified';
  protected $tires = 4;
  public $wheelDrive = 'rear';

  public function set_classification($value)
  {
    $this->classification = $value;
  }

>>>>>>> dev
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
<<<<<<< HEAD
  public $bedLength;
  public $isMover = true;
=======
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
>>>>>>> dev

  public function displayTruck()
  {
    parent::displayVehicle();
<<<<<<< HEAD
    echo "Bed Length: {$this->bedLength}<br>
    For Moving? ";
    if ($this->isMover) {
      echo "Yes";
    } else {
      echo "No";
=======
    echo "Bed Length: " . $this->get_bedLength() . "<br>
    For Moving? ";
    if ($this->isMover) {
      echo "Yes, move away!";
    } else {
      echo "Not for moving.";
>>>>>>> dev
    }
    echo "<br>";
  }
}

class Car extends Vehicle
{
  public $isConvertible = false;

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
<<<<<<< HEAD
$colorado->classification = 'pick-up truck';
$colorado->make = 'Chevy';
$colorado->model = 'Colorado';
$colorado->year = 2014;
$colorado->bedLength = 8;
$colorado->displayTruck();

$frontier = new Truck;
$frontier->classification = 'pick-up truck';
$frontier->make = 'Nissan';
$frontier->model = 'Frontier';
$frontier->year = 2012;
$frontier->bedLength = 6;
$frontier->displayTruck();
=======
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
>>>>>>> dev

$camry = new Car;
$camry->make = 'Toyota';
$camry->model = 'Camry';
$camry->year = '2020';
<<<<<<< HEAD
$camry->classification = 'Sedan';
$camry->wheelDrive = 'front';
$camry->displayCar();

$supra = new SportsCar;
$supra->classification = 'coupe';
=======
$camry->set_classification('Sedan');
$camry->wheelDrive = 'front';

$supra = new SportsCar;
$supra->set_classification('coupe');
>>>>>>> dev
$supra->make = 'Toyota';
$supra->model = 'Supra';
$supra->year = '1993';
$supra->isConvertible = true;
<<<<<<< HEAD
$supra->displayCar();
=======

$colorado->displayTruck();
echo "<hr>";
$frontier->displayTruck();
echo "<hr>";
$camry->displayCar();
echo "<hr>";
$supra->displayCar();
echo "<hr>";
>>>>>>> dev
