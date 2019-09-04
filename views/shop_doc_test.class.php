<?php
include_once 'index.class.php';
$data = array ( 'page' => 'shop',
                'submit' => 'In mand',
                'form' => array ('id' => array('type' => 'hidden')),
                'items' => array ( 0 => array( "items_id" => "1", 
                                               "name" => "monniken_sokken", 
                                               "description" => "Deze sokken zijn gestolen van monniken uit het St. Bernard klooster uit de Ardennen.", 
                                               "price" => "125.95", "picture_url"=> "socks1_big.jpg" )));


showResponsePage($data);