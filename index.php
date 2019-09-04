<?php
require_once 'controllers/page_controller.class.php';
require_once 'controllers/user_controller.class.php';
require_once 'models/database_model.class.php';
require_once 'models/session_model.class.php';
require_once 'models/page_model.class.php';
require_once 'models/user_model.class.php';
require_once 'views/home_doc.class.php';
require_once 'views/about_doc.class.php';
require_once 'views/contact_doc.class.php';
require_once 'views/login_doc.class.php';
require_once 'views/register_doc.class.php';
require_once 'views/shop_doc.class.php';
require_once 'views/shop_cart_doc.class.php';
require_once 'views/top_five_doc.class.php';

session_start();
$controller = new Page_Controller();
$controller -> handleRequest();

/*
  function showResponsePage($data)
  {
    switch ($data['page'])
    {
        case 'home':
            require_once 'home_doc.class.php';
            $view = new Home_Doc($data);
            break;
        case 'about':
            require_once 'about_doc.class.php';
            $view = new About_Doc($data);
            break;
        case 'contact':
            require_once 'contact_doc.class.php';
            $view = new Contact_Doc($data);
            break;
        case 'register':
            require_once 'register_doc.class.php';
            $view = new Register_Doc($data);
            break;
        case 'login':
            require_once 'login_doc.class.php';
            $view = new Login_Doc($data);
            break;
        case 'shop':
            require_once 'shop_doc.class.php';
            $view = new Shop_Doc($data);
            break;
        case 'shopping cart':
            require_once 'shop_cart_doc.class.php';
            $view = new Shop_Cart_Doc($data);
            break;
        case 'top five':
            require_once 'top_five_doc.class.php';
            $view = new Top_Five_Doc($data);
            break;
        case 'thanks':
            require_once 'show_thanks_doc.class.php';
            $view = new Show_Thanks_Doc($data);
            break;
    }
    $view -> Show();
  }*/
