<?php
require_once 'page_model.class.php';

class User_Model extends Page_Model
{
  public $comment = '';
  public $commentErr = '';
  public $name = '';
  public $nameErr = '';
  public $email = '';
  public $emailErr = '';
  public $password = '';
  public $passwordErr = '';
  public $password2 = '';
  public $valid = false;

  //gets pageModel from Page_Model with page, isPost and menu
  public function __construct($pageModel)
  {
      parent::__construct($pageModel);
  }

  public static function testInput($data)
  {
      $data = trim($data);
      $data = htmlspecialchars($data);
      $data = stripslashes($data);
      return $data;
  }

  public function validateLoginForm()
  {
    $this->email = self::testInput(self::getPostVar('email'));
    $this->password = self::testInput(self::getPostVar('password'));

    if($this->isPost)
    {
      if(empty($this->email))
      {
        $this->emailErr = 'Your email has been left empty.';
      }
      else if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
      {
        $this->emailErr = 'You have not entered a valid email adress.';
      }
      else if(empty($this->password))
      {
        $this->passwordErr = 'Your password has been left empty.';
      }
      else
      {
        $this->valid = true;
      }
    }
  }

  public function validateRegisterForm()
  {
    $this->email = self::testInput(self::getPostVar('email'));
    $this->name = self::testInput(self::getPostVar('name'));
    $this->password = self::testInput(self::getPostVar('password'));
    $this->password2 = self::testInput(self::getPostVar('password2'));

    if($this->isPost)
    {
      if(empty($this->name)||empty($this->email)||empty($this->password)||empty($this->password2))
      {
        $this->nameErr = 'Please completely fill out the form to register.';
      }
      if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
      {
        $this->emailErr = 'You have not entered a valid email adress.';
      }
      if(!($this->password==$this->password2))
      {
        $this->passwordErr = 'Your passwords are not the same.';
      }
      else
      {
        $this->valid = true;
      }
    }
  }

  public function validateContactForm()
  {
    $this->email = User_Model::testInput(self::getPostVar('email'));
    $this->name = User_Model::testInput(self::getPostVar('name'));
    $this->comment = User_Model::testInput(self::getPostVar('comment'));

    if($this->isPost)
    {
      if(empty($this->email))
      {
        $this->emailErr = 'Your email has been left empty.';
      }
      else if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
      {
        $this->emailErr = 'You have not entered a valid email adress.';
      }
      else
      {
        $this->valid = true;
      }
    }
  }

  public function authenticateUser()
  {
    try
    {
      $this->valid = false;
      $info = Database_Model::findUserByEmail($this->email);
      if($this->isPost)
      {
        if (empty($info))
        {
          $this->emailErr = 'User cannot be found. Please enter a different emailaddress.';
        }
        else if (trim($info['password'])!=$this->password)
        {
          $this->passwordErr = 'Wrong password. Please enter the correct password';
        }
        else
        {
          $this->valid = true;
        }
      }
    }
    catch(Exception $e)
    {
      $emailErr = "there are some technical difficulties";
      echo "to Log:" . $e->getMessage();
    }
  }

  public function authenticateRegistration()
  {
    $this->valid = false;
    $info = Database_Model::findUserByEmail($this->email);

    if (!empty($info))
    {
      $this->emailErr = 'Account is already in use.';
    }
    else
    {
      $this->valid = true;
    }
  }


  public function registerUser()
  {
    try
    {
      Database_Model::storeUser($this->name, $this->email, $this->password);
    }
    catch (Exception $e)
    {
      $this->registerErr = "there are some technical difficulties";
      echo "To Log:" . $e->getMessage();
    }
  }


}

 ?>
