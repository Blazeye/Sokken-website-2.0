<?php


class Shop_Controller
{
  private $shopModel;

  public function __construct($pageModel)
  {
    $this->shopModel = $pageModel;
  }

  public function handleShop()
  {
    echo "shop_controller::handleShop" . PHP_EOL;
    //load all of the shop data
    $this->shopModel->validateShop();
    $this->shopModel->showButton=false;
    //check if logged in to show buttons to put items into the cart
    if(Session_Model::isLoggedIn())
    {
        $this->shopModel->showButton=true;
    }
    //redirect to the login page
    $view = new Shop_Doc($this->shopModel);
    $view->show();

  }
  public function handleShopDetail()
  {
    echo "shop_controller::handleShop" . PHP_EOL;
    //load all of the shop data
    $this->shopModel->validateShopDetail();
    $this->shopModel->showButton=false;
    //check if logged in to show buttons to put items into the cart
    if(Session_Model::isLoggedIn())
    {
        $this->shopModel->showButton=true;
    }
    //redirect to the login page
    $view = new Shop_Doc($this->shopModel);
    $view->show();

  }


}  

?>