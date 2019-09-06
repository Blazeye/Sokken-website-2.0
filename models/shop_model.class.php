<?php
require_once 'page_model.class.php';

class Shop_Model extends Page_Model
{
    public $items = array();
    public $button = '';
    public $buttonNr = '';
    public $showButton = false;

    //gets pageModel from Page_Model with page, isPost and menu
    public function __construct($pageModel)
    {
        echo " shop_model::construct" . PHP_EOL;
        parent::__construct($pageModel);
    }

    public function validateShop()
    {
        echo "shop_model::validateShop" . PHP_EOL;
        $this->button = self::testInput(self::getPostVar($this->buttonNr));
        if($this->items==null)
        {
            $this->items=Database_Model::getAllItems();
        }
        if($this->isPost)
        {
            $this->valid = true;
        }
    }

    public function validateShopDetail()
    {
        echo "shop_model::validateShopDetail" . PHP_EOL;
        $id = self::testInput(self::getPostVar('id'));
        $this->items=array (Database_Model::getItem($id));
        if($this->items==null)
        {
            $this->items=Database_Model::getAllItems();
        }
        if($this->isPost)
        {
            $this->valid = true;
        }
    }
}

?>