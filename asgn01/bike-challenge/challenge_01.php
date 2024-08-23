<?php

class Bicycle
{
  var $brand;
  var $model;
  var $year;
  var $description = 'Used bicycle';
  var $weight_kg = 0.0;

  function name()
  {
    return $this->brand . " " . $this->model . " (" . $this->year . ")";
  }

  function weight_lbs()
  {
    return floatval($this->weight_kg) * 2.2046226218;
  }

  function set_weight_lbs() {}
}


$specialized = new Bicycle;
$specialized->brand = 'Specialized';
$specialized->model = 'Stump Jumper';
$specialized->year = '2022';
$specialized->weight_kg = 10;

$transition = new Bicycle;
$transition->brand = 'Transition';
$transition->model = 'Spire';
$transition->year = '2023';
$transition->weight_kg = 9;
