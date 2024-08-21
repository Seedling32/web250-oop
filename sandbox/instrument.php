<?php

class Bird
{
  var $commonName;
  var $food = 'Bugs';
  var $nestPlacement = 'Trees';
  var $conservationLevel;

  //constructor

  public function __construct($commonName, $food, $nestPlacement, $conservationLevel)
  {
    $this->commonName = $commonName;
    $this->food = $food;
    $this->nestPlacement = $nestPlacement;
    $this->conservationLevel = $conservationLevel;
  }

  //methods

  public function displayDetails()
  {
    echo 'Bird details<br>';
    echo 'name: ' . $this->commonName . '<br>';
    echo 'food: ' . $this->food . '<br>';
    echo 'nest placement: ' . $this->nestPlacement . '<br>';
    echo 'conservation level: ' . $this->conservationLevel . '<br>';
  }



  public function canFly() {}
}

$bird1 = new Bird('cardinal', 'worms', 'low trees', 'common');

$bird1->displayDetails();
