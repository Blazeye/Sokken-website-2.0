<?php
require_once 'page_model.class.php';

class Shop_Model extends Page_Model
{
    public $button = '';
    public $items = array();
    public $showButton = false;
  
    //gets pageModel from Page_Model with page, isPost and menu
    public function __construct($pageModel)
    {
        parent::__construct($pageModel);
    }

    public static function testInput($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        return $data;
    }

    public function authenticateShop()
    {
        $this->button = self::testInput(self::getPostVar('id'));
        if($this->items==null)
        {
            $items=Database_Model::getAllItems();
        }
        if($this->isPost)
        {
            $this->valid = true;
        }
    }
}

?>