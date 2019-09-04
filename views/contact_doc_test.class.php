<?php
include_once 'index.class.php';
$data = array ( 'page' => 'contact',
                'submit' => 'Verstuur',
                'form' => array ('name' => array('label' => 'Naam:', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'bijv. Jan Smit', 'has_error' => true, 'validation' => array ('required', 'min_length3')),
                                'email' => array('label' => 'Emailadres:', 'type' => 'email', 'class' => 'form-control', 'placeholder' => 'bijv. adres@gmail.com','has_error' => true, 'validation' => array ('required', 'valid_email')),
                                'message' => array('label' => '', 'cols' => 24, 'rows' => 8, 'class' => 'md-textarea form-control', 'type' => 'textarea', 'placeholder' => 'Voer hier jouw bericht in aub', 'has_error' => true, 'validation' => array ('required'))));

showResponsePage($data);
?>