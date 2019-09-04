<?php

class Session_Model
{
  public static function login($name)
  {
    session_unset();
    $_SESSION['name'] = $name;
  }

  public static function isLoggedIn()
  {
    return isset($_SESSION['name']) ? true : false;
  }

  public static function logoutUser()
  {
    session_unset();
  }

  public static function getLoggedInUserName()
  {
    if(self::isLoggedIn())
    {
      return $_SESSION['name'];
    }
  }

}
?>
