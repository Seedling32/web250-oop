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
