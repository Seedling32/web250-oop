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
  public $password_required = true;

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

  static public function find_by_username($username)
  {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE username='" . self::$database->escape_string($username) . "'";
    $obj_array = static::find_by_sql($sql);
    if (!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
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

  protected function set_hashed_password()
  {
    $this->hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
  }

  public function verify_password($password)
  {
    return password_verify($password, $this->hashed_password);
  }

  protected function create()
  {
    $this->set_hashed_password();
    return parent::create();
  }

  protected function update()
  {
    if ($this->password != '') {
      $this->set_hashed_password();
    } else {
      $this->password_required = false;
    }
    return parent::update();
  }

  protected function validate()
  {
    $this->errors = [];

    if (is_blank($this->first_name)) {
      $this->errors['first_name'] = 'First name cannot be blank.';
    } else if (!has_length($this->first_name, array('min' => 2, 'max' => 255))) {
      $this->errors['first_name'] = "First name must be between 2 and 255 characters.";
    }

    if (is_blank($this->last_name)) {
      $this->errors['last_name'] = 'Last name cannot be blank.';
    } else if (!has_length($this->first_name, array('min' => 2, 'max' => 255))) {
      $this->errors['last_name'] = "First name must be between 2 and 255 characters.";
    }

    if (is_blank($this->email)) {
      $this->errors['email'] = 'Email cannot be blank.';
    } else if (!has_length($this->email, array('max' => 255))) {
      $this->errors['email'] = "Email must be less than 255 characters.";
    } else if (!has_valid_email_format($this->email)) {
      $this->errors['email'] = "Email must be a valid format.";
    }

    if ($this->user_level === "Select One") {
      $this->errors['user_level'] = "User level must be defined.";
    }

    if (is_blank($this->username)) {
      $this->errors['username'] = 'Username cannot be blank.';
    } else if (!has_length($this->first_name, array('min' => 2, 'max' => 255))) {
      $this->errors['username'] = "Username must be between 2 and 255 characters.";
    } else if (!has_unique_username($this->username, $this->id ?? 0)) {
      $this->errors['username'] = "Username already exists. Try another.";
    }

    if ($this->password_required) {
      if (is_blank($this->password)) {
        $this->errors['password'] = "Password cannot be blank";
      } else if (!has_length($this->password, array('min' => 12))) {
        $this->errors['password'] = "Password must contain 12 or more characters.";
      } else if (!preg_match('/[A-Z]/', $this->password)) {
        $this->errors['password'] = "Password must contain at least 1 uppercase letter.";
      } else if (!preg_match('/[a-z]/', $this->password)) {
        $this->errors['password'] = "Password must contain at least 1 lowercase letter.";
      } else if (!preg_match('/[0-9]/', $this->password)) {
        $this->errors['password'] = "Password must contain at least 1 number.";
      } else if (!preg_match('/[^A-Za-z0-9\s]/', $this->password)) {
        $this->errors['password'] = "Password must contain at least 1 symbol.";
      }

      if (is_blank($this->confirm_password)) {
        $this->errors['confirm_password'] = "Confirm password cannot be blank.";
      } else if ($this->password !== $this->confirm_password) {
        $this->errors['confirm_password'] = "Password and confirm password must match.";
      }
    }
    return $this->errors;
  }
}
