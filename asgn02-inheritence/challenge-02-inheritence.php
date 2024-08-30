<?php

class Vehicle
{
  public $make;
  public $model;
  public $year;

  public function display()
  {
    return "This vehicle is made by {$this->make} and is the {$this->model} model made in ({$this->year}).";
  }
}

class Truck extends Vehicle
{
  public $bedLength;

  public function display()
  {
    return parent::display() . "This vehicle has a {$this->bedLength} foot bed.";
  }
}

class Car extends Vehicle
{
  public $wheelDrive;

  public function display()
  {
    return parent::display() . "This vehicle is {$this->wheelDrive} wheel drive.";
  }
}

$frontier = new Truck;
$frontier->make = 'Nissan';
$frontier->model = 'Frontier';
$frontier->year = 2012;
$frontier->bedLength = 6;

$colorado = new Truck;
$colorado->make = 'Chevy';
$colorado->model = 'Colorado';
$colorado->year = 2014;
$colorado->bedLength = 8;

$supra = new Car;
$supra->make = 'Toyota';
$supra->model = 'Supra';
$supra->year = '1993';
$supra->wheelDrive = 'rear';

echo $frontier->display();
echo $colorado->display();
echo $supra->display();
