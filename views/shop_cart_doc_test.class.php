<?php
include_once 'index.class.php';
$data = array ( 'page' => 'shopping cart',
                'submit' => 'Verstuur',
                'label' => array(0 => 'product naam',1 => 'amount', 2 => 'prijs'),
                'form' => array ('id' => array('type' => 'hidden')),
                'items' => array ( 0 => array( "items_id" => "1",
                                               "name" => "monniken_sokken",
                                               "amount" => 4,
                                               "price" => "125.95")));

showResponsePage($data);