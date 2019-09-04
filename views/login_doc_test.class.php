<?php
include_once 'index.class.php';
$data = array ( 'page' => 'login', 
                'submit' => 'Verstuur',
                'class' => 'form-group row m-2 col-md-6',
                'form' => array ('email' => array('label' => 'Emailadres:', 'type' => 'email', 'class' => 'form-control', 'placeholder' => 'bijv. adres@gmail.com', 'has_error' => true, 'validation' => array ('required', 'valid_email', 'known_user','authenticate_user')),
                                 'password' => array('label' => 'Wachtwoord:', 'type' => 'password', 'class' => 'form-control', 'placeholder' => '', 'has_error' => true, 'validation' => array ('required', 'valid_pass'))));

showResponsePage($data);
?>