<?php

class Session
{
  private $member_id;
  private $member_user_level;

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
      $_SESSION['member_id']  = $member->id;
      $this->member_id = $member->id;

      $_SESSION['member_user_level'] = $member->user_level;
      $this->member_user_level = $member->user_level;
    }
    return true;
  }

  public function is_logged_in()
  {
    return isset($this->member_id);
    return isset($this->member_user_level);
  }

  public function logout()
  {
    unset($_SESSION['member_id']);
    unset($this->member_id);
    unset($_SESSION['member_user_level']);
    unset($this->member_user_level);
    return true;
  }

  private function check_stored_login()
  {
    if (isset($_SESSION['member_id'])) {
      $this->member_id = $_SESSION['member_id'];
      $this->member_user_level = $_SESSION['member_user_level'];
    }
  }
}
