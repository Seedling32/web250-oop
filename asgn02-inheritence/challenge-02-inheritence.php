<?php

class Vehicle
{
  public $make;
  public $model;
  public $year;
  public $classification;
  public $tires = 4;
  public $wheelDrive = 'rear';

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
  public $bedLength;
  public $isMover = true;

  public function displayTruck()
  {
    parent::displayVehicle();
    echo "Bed Length: {$this->bedLength}<br>
    For Moving? ";
    if ($this->isMover) {
      echo "Yes";
    } else {
      echo "No";
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

$camry = new Car;
$camry->make = 'Toyota';
$camry->model = 'Camry';
$camry->year = '2020';
$camry->classification = 'Sedan';
$camry->wheelDrive = 'front';
$camry->displayCar();

$supra = new SportsCar;
$supra->classification = 'coupe';
$supra->make = 'Toyota';
$supra->model = 'Supra';
$supra->year = '1993';
$supra->isConvertible = true;
$supra->displayCar();
