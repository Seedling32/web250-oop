<?php

class Member extends DatabaseObject
{
  static protected $table_name = "members";
  static protected $db_columns = ['id', 'first_name' . 'last_name', 'email', 'username', 'user_level', 'hashed_password'];

  public $id;
  public $first_name;
  public $last_name;
  public $email;
  public $username;
  public $user_level;
  protected $hashed_password;
  public $password;
  public $confirm_password;

  public function __construct($args = [])
  {
    $this->first_name = $args['first_name'];
    $this->last_name = $args['last_name'];
    $this->email = $args['email'];
    $this->username = $args['username'];
    $this->user_level = $args['user_level'];
    $this->password = $args['password'];
    $this->confirm_password = $args['confirm_password'];
  }

  public function full_name()
  {
    return $this->first_name . " " . $this->last_name;
  }
}
