<?php
include_once 'index.class.php';
$data = array ( 'page' => 'top five',
                'submit' => 'Verstuur',
                'label' => array(0 => 'rank',1 => 'product naam', 2 => 'aantal besteld'),
                'form' => array ('id' => array('type' => 'hidden')),
                'items' => array ( 0 => array( "items_id" => "1",
                                               "name" => "monniken_sokken",
                                               "amount" => 4,
                                               "price" => "125.95")));

showResponsePage($data);