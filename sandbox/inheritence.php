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
  public $classification;

  public function display()
  {
    return parent::display() . "This vehicle is a {$this->classification}.";
  }
}

$frontier = new Truck;
$frontier->make = 'Nissan';
$frontier->model = 'Frontier';
$frontier->year = 2012;
$frontier->classification = 'Pick-up truck';

$colorado = new Truck;
$colorado->make = 'Chevy';
$colorado->model = 'Colorado';
$colorado->year = 2014;
$colorado->classification = 'Pick-up truck';

echo $frontier->display();
