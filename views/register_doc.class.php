<?php
require_once 'form_doc.class.php';

class Register_Doc extends Form_Doc
{
    public function __construct($myData)
    {
        parent::__construct($myData);
    }

    protected function formContent()
    {
        $this->createInput('div_start', 'form-group row m-2');
        $this->createInput('text', 'form-control col-md-6', $this->model->nameErr, 'Naam:', 'bijv. Jan Smit', 'name', '');
        $this->createInput('email', 'form-control col-md-6', $this->model->emailErr, 'Emailadres:', 'bijv. adres@gmail.com', 'email', '');
        $this->createInput('password', 'form-control col-md-6', $this->model->passwordErr, 'Wachtwoord:', '', 'password', '');
        $this->createInput('password', 'form-control col-md-6', '', 'Herhaal wachtwoord:', '', 'password2', '');
        $this->createInput('hidden', 'form-control col-md-6', '', '', '', 'page', $this->model->page);
        $this->createInput('submit', 'btn btn-primary my-2', '', '', '', 'submit', 'Verstuur');
        $this->createInput('div_end');
    }
}
