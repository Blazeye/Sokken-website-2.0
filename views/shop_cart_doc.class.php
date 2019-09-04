<?php
include_once 'shop_base_doc.class.php';

class Shop_Cart_Doc extends Shop_Base_Doc
{
    public function __construct($myData)
    {
        parent::__construct($myData);
    }
    
    protected function tableBodyContent()
    {
        $total_cost = 0;
        
        foreach($this->data['items'] as $key => $field_array)
        {
            $this->productInfo($field_array);
            $addOrSubtractData = ';'.strval($field_array['amount']).';'.$field_array['items_id'].';'.$field_array['price'].';'.$field_array['name'];
            echo'<td><div class="text-nowrap">';
            $this->button('-', $addOrSubtractData, 'shopping-cart-button btn btn-primary m-1 d-inline-block');
            $this->productAmount($field_array);
            $this->button('+', $addOrSubtractData, 'shopping-cart-button btn btn-primary m-1 d-inline-block');
            echo '</div></td>';
            $total_cost = $this->productCost($field_array, $total_cost);
        }
        
        return $total_cost;
    }
    
  
    
    protected function mainContent()
    {
        if(!empty($this->data['items']))
        {
            $datastring = $this->calculateDatastring();
            $total_cost = $this->shopTable();
            $this->totalCost($total_cost);
            $this->button('Bestel', $datastring, 'btn btn-primary my-2 col');
        }
        else
        {
            $this->messageCartIsEmpty();
        }
    }
    
    private function calculateDatastring()
    {
        $datastring="";
        foreach ($this->data['items'] as $x => $value)
        {
            $datastring = $datastring ."/". implode(";",$value);
            
        }
        return $datastring;
    }
    
    private function totalCost($total_cost)
    {
        echo '<div class="font-weight-bold d-inline row">
                  <p class="col text-right">Total price:</p>
                  <p class="col text-right responsive-with-vw">&euro;' . $total_cost . '</p>';
    }
    
    private function messageCartIsEmpty()
    {
        echo '<div class="row justify-content-center">
                 <div class="col-sm-8 col-md-6 col-lg-4 border border-dark mx-2 my-4 p-1">
                    <p>Your shopping cart is empty.
                       Please go to the webshop and fill up your shopping cart first.</p>
                 </div>
              </div>';
    }
    
    
    private function productInfo($field_array)
    {
        echo '<tr>
                 <th scope="col">' . 
                     str_replace("_", " ", $field_array['name']) . '
                 </th>
                 <td>
                     <div class="text-nowrap">';
    }
    
    private function productAmount($field_array)
    {
        echo '<span>' . $field_array['amount'] . '</span>';
    }
    
    private function productCost($field_array, $total_cost)
    {
        $cost = $field_array['price'] * $field_array['amount'];
        echo '</div></td>
                <td> &euro;'.$cost.' </td>';
        $total_cost += $cost;
        return $total_cost;
        echo '</tr>';
    }
}