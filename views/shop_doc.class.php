<?php
require_once 'shop_base_doc.class.php';

class Shop_Doc extends Shop_Base_Doc
{
    public $label = array();

    public function __construct($model)
    {
        $this->label = array("name", "description", "price");
        parent::__construct($model);

    }
    
    protected function mainContent()
    {
        $this->shopStart();
        $this->productsListed();
        $this->end();
    }
    
    private function productsListed()
    {
        foreach($this->model->items as $key => $field_array)
        {
            //var_dump($field_array);
            $this->productStart();
            $this->productContent($field_array);
            if($this->model->showButton)
            {
                $this->button('In mand', $key, 'btn btn-primary col-8');
            }
            $this->end();
        }
    }
    
    
    
    private function shopStart()
    {
        echo '<div class="row">';
    }
    
    private function productStart()
    {
        if(count($this->model->items)==1)
        {
            echo '<div col>';
        }
        else
        {
            echo '<div class="col-12 col-sm-6 col-md-4 col-lg-3">';
        }
    }
    
    private function productContent($field_array)
    {
        $this->productImage($field_array);
        $this->productInfo($field_array);
        
    }
    
    private function productImage($field_array)
    {
        if(count($this->model->items)==1)
        {
            $img_size='large_size img-fluid';
        }
        else
        {
            $img_size='small_size img-fluid';
        }
        echo    '<a href="index.php?page=shop_detail&id='.$field_array["id"].'" class="m-1">
                    <img class="'.$img_size.' rounded mx-auto d-block" src="images/'.$field_array["picture_url"].'" alt="image cannot load"/>
                 </a>';
    }
    
    private function productInfo($field_array)
    {
        echo '<div class="m-1 text-center">';
            
            
        if(count($this->model->items)==1)
        {
           echo   '<p class="responsive-bigger-after-380"><b>' . str_replace("_", " ", $field_array["name"]) . '</b></p>
                   <div class="container"><div class="row justify-content-center"><div class="col-sm-10 col-md-8 col-lg-6 border border-dark text-justify">
                   <p>Beschrijving: ' . $field_array['description'] . '</p></div></div></div>
                   <small><p class="responsive-bigger-after-380">Prijs: <b>&euro;' . $field_array["price"] . '</b></small></p>
                   </div>';
        }
        else
        {
            echo   '<p class=""><b>' . str_replace("_", " ",$field_array["name"]) . '</b></p>
                    <small><p class="">Prijs: <b>&euro;' . $field_array["price"] . '</b></small></p>
                    </div>';
        }
    }
    
    protected function formContent($id='', $operator='')
    {
        echo '<input type="hidden" name="id" value="'.$this->model->id.'">';
    }
    
    private function end()
    {
        echo '</div>';
    }
}