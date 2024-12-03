<?php

class Session
{
  private $member_id;
  private $member_user_level;
  public $username;
  private $last_login;
  public const MAX_LOGIN_AGE = 60 * 60 * 24;

  public function __construct()
  {
    session_start();
    $this->check_stored_login();
  }

  public function get_user_level()
  {
    return $this->member_user_level;
  }

  public function login($member)
  {
    if ($member) {
      session_regenerate_id();
      $this->member_id = $_SESSION['member_id']  = $member->id;
      $this->member_user_level = $_SESSION['member_user_level'] = $member->user_level;
      $this->username = $_SESSION['username'] = $member->username;
      $this->last_login = $_SESSION['last_login'] = time();
    }
    return true;
  }

  public function is_logged_in()
  {
    return isset($this->member_id) && $this->last_login_is_recent();
  }

  public function logout()
  {
    unset($_SESSION['member_id']);
    unset($this->member_id);
    unset($_SESSION['member_user_level']);
    unset($this->member_user_level);
    unset($_SESSION['username']);
    unset($this->username);
    unset($_SESSION['last_login']);
    unset($this->last_login);
    return true;
  }

  private function check_stored_login()
  {
    if (isset($_SESSION['member_id'])) {
      $this->member_id = $_SESSION['member_id'];
      $this->member_user_level = $_SESSION['member_user_level'];
      $this->username = $_SESSION['username'];
      $this->last_login = $_SESSION['last_login'];
    }
  }

  private function last_login_is_recent()
  {
    if (!isset($this->last_login)) {
      return false;
    } else if (($this->last_login + self::MAX_LOGIN_AGE) < time()) {
      return false;
    } else {
      return true;
    }
  }
}
