<?php


class Page_Controller
{
    //private $model;
    private $model;

    public function __construct()
    {
        $this->model = new Page_Model(NULL);
    }

    public function handleRequest()
    {
        echo "page_controller::handleRequest" . PHP_EOL;
      $this->model->getRequestedPage();
      $this->model->generateMenu();

      switch ($this->model->page)
      {
            case 'home':
                $view = new Home_Doc($this->model);
                $view->show();
                break;

            case 'about':
                $view = new About_Doc($this->model);
                $view->show();
                break;

            case 'login':
                $model = new User_Model($this->model);
                $controller = new User_Controller($model);
                $controller->handleLogin();
                break;

            case 'register':
                $model = new User_Model($this->model);
                $controller = new User_Controller($model);
                $controller->handleRegister();
                break;

            case 'contact':
                $model = new User_Model($this->model);
                $controller = new User_Controller($model);
                $controller->handleContact();
                break;

            case 'logout':
                $model = new User_Model($this->model);
                $controller = new User_Controller($model);
                $controller->handleLogout();
                break;

            case 'shop':
                $model = new Shop_Model($this->model);
                $controller = new Shop_Controller($model);
                $controller->handleShop();
                break;
            
            case 'shop_detail':
                $model = new Shop_Model($this->model);
                $controller = new Shop_Controller($model);
                $controller->handleShopDetail();
                break;

            case 'shopping cart':
                $model = new Shop_Model($this->model);
                $controller = new Shop_Controller($model);
                $controller->handleShoppingCart();
                break;
        }
    }
}

?>
