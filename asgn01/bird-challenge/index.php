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
    return 'This birds song goes something like this: ' . $this->song . '<br>';
  }

  function canFly()
  {
    if ($this->fly) {
      return 'This bird can fly!';
    } else {
      return 'This bird cannot fly.';
    }
  }

  function displayDetails()
  {
    echo '<h1>Bird details</h1>';
    echo '<table>';
    echo '<tr>';
    echo '<th>Name: </th>';
    echo '<td>' . $this->commonName . '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th>Food: </th>';
    echo '<td>' . $this->food . '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th>Nest placement: </th>';
    echo '<td>' . $this->nestPlacement . '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th>Conservation level: </th>';
    echo '<td>' . $this->conservationLevel . '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th>Song: </th>';
    echo '<td>' . $this->song() . '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th>Can I fly?</th>';
    echo '<td>' . $this->canFly() . '</td>';
    echo '</tr>';
    echo '</table>';
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
