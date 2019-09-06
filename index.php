<?php
require_once 'controllers/page_controller.class.php';
require_once 'controllers/shop_controller.class.php';
require_once 'controllers/user_controller.class.php';
require_once 'models/database_model.class.php';
require_once 'models/session_model.class.php';
require_once 'models/page_model.class.php';
require_once 'models/shop_model.class.php';
require_once 'models/user_model.class.php';
require_once 'views/home_doc.class.php';
require_once 'views/about_doc.class.php';
require_once 'views/contact_doc.class.php';
require_once 'views/login_doc.class.php';
require_once 'views/register_doc.class.php';
require_once 'views/shop_doc.class.php';
require_once 'views/shop_cart_doc.class.php';
require_once 'views/show_thanks_doc.class.php';
require_once 'views/top_five_doc.class.php';

session_start();
$controller = new Page_Controller();
$controller -> handleRequest();
?>