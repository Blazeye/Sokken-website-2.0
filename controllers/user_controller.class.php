<?php

class User_Controller
{
  private $userModel;

  public function __construct($pageModel)
  {
    $this->userModel = $pageModel;
  }

  public function handleLogin()
  {
    //validate data users input and return valid
    $this->userModel->validateLoginForm();
    //redirect to the login page
    $view = new Login_Doc($this->userModel);
    //check if data is valid after validation step
    if($this->userModel->valid)
    {
      $this->userModel->authenticateUser();
      if($this->userModel->valid)
      {
        $this->userModel->name=Database_Model::findUserByEmail($this->userModel->email)['name'];
        Session_Model::login($this->userModel->name);
        $view = new Home_Doc($this->userModel);
        $this->userModel->generateMenu();
      }
    }
    $view->show();
  }

  public function handleRegister()
  {
    //validate data users input and return valid
    $this->userModel->validateRegisterForm();
    //redirect to the login page
    $view = new Register_Doc($this->userModel);
    //check if data is valid after validation step
    if($this->userModel->valid)
    {
      $this->userModel->authenticateRegistration();
      if($this->userModel->valid)
      {
        $this->userModel->registerUser();
        $view = new Login_Doc($this->userModel);
        $this->userModel->generateMenu();
      }
    }
    $view->show();
  }

  public function handleContact()
  {
    //validate data users input and return valid
    $this->userModel->validateContactForm();
    //redirect to the contact page
    $view = new Contact_Doc($this->userModel);
    $view->show();
  }

  public function handleLogout()
  {
    Session_Model::logoutUser();
    $view = new Home_Doc($this->userModel);
    $this->userModel->generateMenu();
    $view->show();
  }




/*
  function save_user_info($name, $email, $password)
  {
    require_once('dbDatastore.php');
    store_user($name, $email, $password);
  }*/
}

?>
