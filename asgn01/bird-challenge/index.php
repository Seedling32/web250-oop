<?php

class Bird
{
  var $commonName;
  var $food;
  var $nestPlacement;
  var $conservationLevel;

  function displayDetails()
  {
    echo 'Bird details<br>';
    echo 'name: ' . $this->commonName . '<br>';
    echo 'food: ' . $this->food . '<br>';
    echo 'nest placement: ' . $this->nestPlacement . '<br>';
    echo 'conservation level: ' . $this->conservationLevel . '<br>';
  }

  function songs() {}

  function canFly() {}
}

$bird1 = new Bird;
$bird1->commonName = 'Cardinal';
$bird1->food = 'Worms';
$bird1->nestPlacement = 'Lower branches';
$bird1->conservationLevel = 'Not protected';

$bird2 = new Bird;
$bird1->commonName = 'Red Tail hawk';
$bird1->food = 'Rodents';
$bird1->nestPlacement = 'Tree tops';
$bird1->conservationLevel = 'Protected';
