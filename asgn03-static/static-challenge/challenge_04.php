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
  protected static $wheels = 2;

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

  public static function wheel_details()
  {
    $wheel_string = static::$wheels == 1 ? "1 wheel" : static::$wheels . "wheels";
    return "It has " . $wheel_string . ".";
  }
}

class Unicycle extends Bicycle
{
  protected static $wheels = 1;
}

$cannondale = new Bicycle;
$cannondale->brand = 'Cannondale';
$cannondale->model = 'Synapse';
$cannondale->year = '2016';
$cannondale->set_weight_kgs(8);

echo 'Bicycle count: ' . Bicycle::$instance_count . '<br>';
echo 'Unicycle count: ' . Unicycle::$instance_count . '<br>';

$trek = Bicycle::create();
$unicycle = Unicycle::create();

echo 'Bicycle count: ' . Bicycle::$instance_count . '<br>';
echo 'Unicycle count: ' . Unicycle::$instance_count . '<br>';

echo '<hr>';

echo 'Categories: ' . implode(', ', Bicycle::CATEGORIES) . '<br>';
$cannondale->category = Bicycle::CATEGORIES[1];
echo 'Category: ' . $cannondale->category . '<br>';

echo '<hr>';

echo 'Bicycle: ' . Bicycle::wheel_details() . '<br>';
echo 'Unicycle: ' . Unicycle::wheel_details() . '<br>';
