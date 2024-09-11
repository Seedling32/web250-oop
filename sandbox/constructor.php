<?php

class Sofa
{
  public static $instanceCount = 0;
  public function __construct()
  {
    self::$instanceCount++;
  }
}

class Couch extends Sofa
{
  public static $couchCount = 0;
  public function __construct()
  {
    self::$couchCount++;
  }
}

class Loveseat extends Sofa
{
  public static $loveCount = 0;
  public function __construct()
  {
    self::$loveCount++;
  }
}

$sofa = new Sofa();
$sofa2 = new Sofa();
$couch = new Couch();
$loveSeat = new Loveseat();


echo 'instance count total: ' . Sofa::$instanceCount . '<br>';
echo 'instance count of couch: ' . Couch::$couchCount . '<br>';
echo 'instance count of loveseat: ' . Loveseat::$loveCount;
