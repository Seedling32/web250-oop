<?php

class Bird
{
  public static $instanceCount = 0;
  public static $eggNum = 0;

  public $habitat;
  public $food;
  public $nesting = "tree";
  public $conservation;
  public $song = "chirp";
  public $flying = "yes";

  public function canFly()
  {
    if ($this->flying == "yes") {
      $flying_string = "can fly";
    } else {
      $flying_string = "is stuck on the ground";
    }
    return  $flying_string;
  }

  public static function create()
  {
    $className = get_called_class();
    $object = new $className;
    self::$instanceCount++;
    return $object;
  }
}

class YellowBelliedFlyCatcher extends Bird
{
  public $name = "yellow-bellied flycatcher";
  public $diet = "mostly insects.";
  public $song = "flat chilk";
}

class Kiwi extends Bird
{
  public $name = "kiwi";
  public $diet = "omnivorous";
  public $flying = "no";
}
