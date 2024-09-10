<?php

class Bicycle
{
  public static $instance_count = 0;

  public $brand;
  public $model;
  public $year;
  public $category;
  public $description = 'Used bicycle';
  private $weight_kg = 0.0;
  protected $wheels = 2;

  public const CATEGORIES = ['Road', 'Mountain', 'Hybrid', 'Cruiser', 'City', 'BMX'];

  public static function create()
  {
    $class_name = get_called_class();
    $obj = new $class_name;
    self::$instance_count++;
    return $obj;
  }

  public function name()
  {
    return $this->brand . " " . $this->model . " (" . $this->year . ")";
  }

  public function set_weight_kgs($value)
  {
    $this->weight_kg = floatval($value);
  }

  public function get_weight_kgs()
  {
    return floatval($this->weight_kg) . " kg";
  }

  public function get_weight_lbs()
  {
    return floatval($this->weight_kg) * 2.2046226218 . " lbs";
  }

  public function set_weight_lbs($value)
  {
    $this->weight_kg = floatval($value) / 2.2046226218;
  }

  public function wheel_details()
  {
    if ($this->wheels == 1) {
      echo "It has one wheel.";
    } else if ($this->wheels == 2) {
      echo "It has two wheels.";
    } else {
      echo "It has {$this->wheels} wheels.";
    }
  }
}

class Unicycle extends Bicycle
{
  protected $wheels = 1;
}

$trek = new Bicycle;
$trek->brand = 'Trek';
$trek->model = 'Emonda';
$trek->year = '2017';
$trek->set_weight_kgs(1);

$cd = new Bicycle;
$cd->brand = 'Cannondale';
$cd->model = 'Synapse';
$cd->year = '2016';
$cd->set_weight_kgs(8);

echo $trek->name() . "<br />";
echo $trek->get_weight_kgs() . "<br />";
echo $trek->get_weight_lbs() . "<br />";

echo "<hr>";

echo $cd->name() . "<br />";
$trek->set_weight_lbs(2);
echo $trek->get_weight_kgs() . "<br />";
echo $trek->get_weight_lbs() . "<br />";
