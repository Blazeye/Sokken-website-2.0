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

  function addItemToCart($item)
  {
    if(!isset($_SESSION['item'])){$_SESSION['item']=array();}
    $_SESSION['exists']=false;
    foreach($_SESSION['item'] as $x => $value)
    {
      if($value['items_id']==$item['items_id'])
      {
        $_SESSION['item'][$x]['price']=$item['price'];
        $_SESSION['item'][$x]['amount']++;
        $_SESSION['exists']=true;
        break;
      }
    }
    if(!$_SESSION['exists'])
    {
      $item['amount']=1;
      array_push($_SESSION['item'], $item);
    }
    return $_SESSION['item'];
  }

}
?>
