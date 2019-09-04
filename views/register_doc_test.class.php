<?php
include_once 'index.class.php';
$data = array ( 'page' => 'register',
                'submit' => 'Verstuur',
                'class' => 'form-group row m-2 col-md-6',
                'form' => array ('name' => array('label' => 'Naam:', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'bijv. Jan Smit', 'has_error' => true, 'validation' => array ('required', 'min_length3')),
                                 'email' => array('label' => 'Emailadres:', 'type' => 'email', 'class' => 'form-control', 'placeholder' => 'bijv. adres@gmail.com', 'has_error' => true, 'validation' => array ('required', 'valid_email', 'email_exists')),
                                 'password' => array('label' => 'Wachtwoord:', 'type' => 'password', 'class' => 'form-control', 'placeholder' => '', 'has_error' => true, 'validation' => array ('required', 'equal_pass')),
                                 'password_2' => array('label' => 'Herhaal wachtwoord:', 'type' => 'password', 'class' => 'form-control', 'placeholder' => '', 'has_error' => true, 'validation' => array ('required'))));

showResponsePage($data);