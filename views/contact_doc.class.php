<?php
require_once 'form_doc.class.php';

class Contact_Doc extends Form_Doc
{
    public function __construct($myData)
    {
        parent::__construct($myData);
    }

    protected function formContent()
    {
        $this->createInput('div_start', 'form-group row m-2');
        $this->createInput('text', 'form-control col-md-6', $this->model->nameErr, 'Naam:', 'bijv. Jan Smit', 'name', '');
        $this->createInput('email', 'form-control col-md-6', $this->model->emailErr, 'Emailadres:', 'i.e. address@gmail.com', 'email', $value['email']='');
        $this->createInput('textarea', 'form-control col-md-6', $this->model->commentErr, ' ', 'Add your message here, please', '', $value['comment']='');
        $this->createInput('hidden', 'form-control col-md-6','', '', '', 'page', $this->model->page);
        $this->createInput('submit', 'btn btn-primary my-2','', '', '', 'submit', 'Verstuur');
        $this->createInput('div_end');
    }
}