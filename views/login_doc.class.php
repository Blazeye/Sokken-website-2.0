<?php
require_once 'form_doc.class.php';

class Login_Doc extends Form_Doc
{

  public function __construct($model)
  {
      parent::__construct($model);

      $a = Database_Model::findUserByEmail($this->model->email);
      var_dump($a);
      var_dump($this->model->email);
      var_dump($this->model->name);
  }

  protected function formContent()
  {
      $this->createInput('div_start', 'form-group row m-2');
      $this->createInput('email', 'form-control col-md-6', $this->model->emailErr, 'Emailadres:', 'bijv. adres@gmail.com', 'email', $value['email']='');
      $this->createInput('password', 'form-control col-md-6',$this->model->passwordErr, 'Wachtwoord:', '', 'password', $value['password']='');
      $this->createInput('hidden', 'form-control col-md-6','', '', '', 'page', $this->model->page);
      $this->createInput('submit', 'btn btn-primary my-2','', '', '', 'submit', 'Verstuur');
      $this->createInput('div_end');
  }
}
