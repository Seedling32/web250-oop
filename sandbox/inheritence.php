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
