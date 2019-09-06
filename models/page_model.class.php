<?php

class Page_Model
{
  public $page;
  protected $isPost;
  public $menu;
  public $form;


  public function __construct($other)
  {
    echo "page_model::construct" . PHP_EOL;
    //adds page, isPost, menu to object when created, if it isn't NULL
    //(instantiated from Page_Controller without the values being defined)
    if(!$other==NULL)
    {
      $this->page = $other->page;
      $this->isPost = $other->isPost;
      $this->menu = $other->menu;
      $this->form = $other->form;
    }
  }

  public static function testInput($data)
  {
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
  }

  //filter post input and return it
  protected static function getPostVar($key, $default='')
  {
    $value = filter_input(INPUT_POST, $key);
    return isset($value) ? $value : $default;
  }

  //filter get input and return it
  protected static function getUrlVar($key, $default='')
  {
    $value = filter_input(INPUT_GET, $key);
    return isset($value) ? $value : $default;
  }

//look if request is post then give $page the value of the post/url variable
  public function getRequestedPage()
  {
    $this->isPost=$_SERVER['REQUEST_METHOD']=='POST';
    if($this->isPost)
    {
      $this->page = self::getPostVar('page', 'home');
    }
    if(!$this->isPost)
    {
      $this->page = self::getUrlVar('page', 'home');
    }
  }

  public function generateMenu()
  {
    $this->menu = array ('home' => array('title' => 'naar de startpagina', 'class'=>'larger-buttons-at-smaller-viewport-vw nav-link mx-1 my-1 bg-dark rounded text-white text-center', 'text' => 'HOME'),
                         'shop' => array('title' => 'koop hier jouw sokken!', 'class'=>'nav-link mx-1 my-1 bg-primary rounded text-white text-center', 'text' => 'WEBSHOP'),
                         'top_5' => array('title' => 'top 5 producten', 'class'=>'nav-link mx-1 my-1 bg-primary rounded text-white text-center', 'text' => 'TOP 5'),
                         'about' => array('title' => 'over mij', 'class'=>'nav-link mx-1 my-1 bg-primary rounded text-white text-center', 'text' => 'ABOUT'),
                         'contact' => array('title' => 'stuur een bericht', 'class'=>'nav-link mx-1 my-1 bg-primary rounded text-white text-center', 'text' => 'CONTACT'));

    if (Session_Model::isLoggedIn())
    {
      $this->menu['shopping_cart'] = array('title' => 'reken af', 'class'=>'text-nowrap nav-link mx-1 my-1 bg-primary rounded text-white text-center', 'text' => 'SHOPPING CART<img class="shopping-cart-img px-1 d-none d-md-inline-block" src="images/shopping-cart.svg" alt=""/>');
      $this->menu['logout'] = array('title' => 'log uit', 'class'=>'nav-link mx-1 my-1 bg-primary rounded text-white text-center', 'text' => 'LOGOUT<span class="d-none d-lg-inline-block">['.Session_Model::getLoggedInUserName().']</span>');
    }
    else
    {
      $this->menu['register'] = array('title' => 'registreer je hier', 'class'=>'nav-link mx-1 my-1 bg-primary rounded text-white text-center', 'text' => 'REGISTER');
      $this->menu['login'] = array('title' => 'log in', 'class'=>'nav-link mx-1 my-1 bg-primary rounded text-white text-center', 'text' => 'LOGIN');
    }
  }
}
