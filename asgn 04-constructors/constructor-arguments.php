<?php

class Bird
{
  public $commonName;
  public $latinName;

  public function __construct($args = [])
  {
    $this->commonName = $args['common name'] ?? NULL;
    $this->latinName = $args['latin name'] ?? NULL;
  }
}

$flyCatcher = new Bird(['common name' => 'Acadian Flycatcher', 'latin name' => 'Empidonax virescens']);

$wren = new Bird(['common name' => 'Carolina Wren', 'latin name' => 'Thryothorus ludovicianus']);

echo "Common name: " . $flyCatcher->commonName . "<br>";
echo "Latin name: " . $flyCatcher->latinName . "<br>";

echo "<hr>";

echo "Common name: " . $wren->commonName . "<br>";
echo "Latin name: " . $wren->latinName . "<br>";
