<?php

class Member extends DatabaseObject
{
  static protected $table_name = "users";
  static protected $db_columns = ['id', 'first_name', 'last_name', 'email', 'username', 'user_level', 'hashed_password'];

  public $id;
  public $first_name;
  public $last_name;
  public $email;
  public $username;
  public $user_level;
  protected $hashed_password;
  public $password;
  public $confirm_password;

  public const USER_OPTIONS = [
    'A' => 'Admin',
    'M' => 'Member'
  ];

  public function __construct($args = [])
  {
    $this->first_name = $args['first_name'] ?? '';
    $this->last_name = $args['last_name'] ?? '';
    $this->email = $args['email'] ?? '';
    $this->username = $args['username'] ?? '';
    $this->user_level = $args['user_level'] ?? '';
    $this->password = $args['password'] ?? '';
    $this->confirm_password = $args['confirm_password'] ?? '';
  }

  public function full_name()
  {
    return $this->first_name . " " . $this->last_name;
  }

  public function email()
  {
    return $this->email;
  }

  public function username()
  {
    return $this->username;
  }

  public function type()
  {
    return $this->user_level;
  }

  public function user_level()
  {
    if ($this->user_level == 'a' || $this->user_level == 'm') {
      return self::USER_OPTIONS[$this->user_level];
    } else {
      return "unknown";
    }
  }

  protected function validate()
  {
    $this->errors = [];
    if (is_blank($this->first_name)) {
      $this->errors['first_name'] = 'First name cannot be blank.';
    }
    if (is_blank($this->last_name)) {
      $this->errors['last_name'] = 'Last name cannot be blank.';
    }
    if (is_blank($this->email)) {
      $this->errors['email'] = 'Email cannot be blank.';
    }
    return $this->errors;
  }
}
