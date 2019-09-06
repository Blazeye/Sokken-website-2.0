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
    //load all of the shop data
    $this->shopModel->authenticateShop();
    $this->shopModel->showButton=false;
    //check if logged in to show buttons to put items into the cart
    if(Session_Model::is_logged_in())
    {
        $this->shopModel->showButton=true;
    }
    //redirect to the login page
    $view = new Shop_Doc($this->shopModel);
    $view->show();

  }

  public function handleShoppingCart(){

  }

}  

?>