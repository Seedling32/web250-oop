<?php

class Bird
{
  var $commonName;
  var $food;
  var $nestPlacement;
  var $conservationLevel;
  var $song = 'none';
  var $fly = false;

  function song()
  {
    echo 'This birds song goes something like this: ' . $this->song . '<br>';
  }

  function canFly()
  {
    if ($this->fly) {
      echo 'This bird can fly!';
    } else {
      echo 'This bird cannot fly.';
    }
  }

  function displayDetails()
  {
    echo '<h1>Bird details</h1>';
    echo '<ul>';
    echo '<li>Name: ' . $this->commonName . '</li>';
    echo '<p>Food: ' . $this->food . '</p>';
    echo '<p>Nest placement: ' . $this->nestPlacement . '</p>';
    echo '<p>Conservation level: ' . $this->conservationLevel . '</p>';
    echo '<p>' . $this->song() . '</p>';
    echo '<p>' . $this->canFly() . '</p>';
  }
}

$bird1 = new Bird;
$bird1->commonName = 'Cardinal';
$bird1->food = 'Worms';
$bird1->nestPlacement = 'Lower branches';
$bird1->conservationLevel = 'Not protected';
$bird1->song = 'drink-your-tea!';
$bird1->fly = true;

echo $bird1->displayDetails();

$bird2 = new Bird;
$bird2->commonName = 'Red Tail hawk';
$bird2->food = 'Rodents';
$bird2->nestPlacement = 'Tree tops';
$bird2->conservationLevel = 'Protected';
$bird2->song = 'whatwhat!';


echo $bird2->displayDetails();

echo "<style type='text/css'>
      body {
         margin: 2rem;
      }

      h1 {
         font-size: 50px;
      }
   </style>";
