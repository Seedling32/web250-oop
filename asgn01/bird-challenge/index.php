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
    return $this->song;
  }

  function canFly()
  {
    if ($this->fly) {
      return 'This bird can fly!';
    } else {
      return 'This bird cannot fly.';
    }
  }

  static $birdCount = 0;

  function displayDetails()
  {
    self::$birdCount++;

    echo '<h2>Bird #' . self::$birdCount . '</h2>';
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

      h2 {
        font-size: 36px;
      }

      table {
        border: #333 solid 1px;
        border-collapse: collapse;
      }

      td,
      th {
        border: #333 solid 1px;
        padding: 5px;
      }
   </style>";
