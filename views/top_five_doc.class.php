<?php
require_once 'shop_base_doc.class.php';

class Top_Five_Doc extends Shop_Base_Doc
{
    public function __construct($myData)
    {
        parent::__construct($myData);
    }
    
    protected function mainContent()
    {
        $this->startTopFive();
        $this->shopTable();
        $this->endTopFive();
    }
    
    protected function tableBodyContent()
    {

    }
    
    private function startTopFive()
    {
        echo '<div class="m-2 p-2 font-weight-bold"><p>Hier zijn de top 5 best verkochte producten in onze winkel:</p>';
    }
    
    private function endTopFive()
    {
        echo '<aside class="small"><p>Door op de naam van het product te klikken wordt u gebracht naar de product pagina.</p></aside></div>';
    }
}