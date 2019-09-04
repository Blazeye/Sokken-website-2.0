<?php
include_once 'form_doc.class.php';

abstract class Shop_Base_Doc extends Form_Doc
{
    public function __construct($myData)
    {
        parent::__construct($myData);
    }

    protected function mainContent()
    {
        
    }
    
    protected function button($operation, $values, $class)
    {
        $this->formStart();
        $this->formContent($operation, $values);
        $this->formSubmit($operation, $class);
        $this->formEnd();
    }
    
    protected function formContent($operation='', $field_array='')
    {
        echo '<input type="hidden" name="id" value="'.$operation.$field_array.'">';
    }
    
    protected function shopTable()
    {
        $this->tableHead();
        $this->tableBodyStart();
        $result = $this->tableBodyContent();
        $this->tableBodyEnd();
        return $result;
    }
    
    private function tableHead()
    {
        echo '<div class="border border-dark col text-center my-2 responsive-with-vw">
                  <table class="table">
                      <thead>
                          <tr>
                          <th scope="col">' . $this->data['label'][0] . '</th>
                          <th scope="col">' . $this->data['label'][1] . '</th>
                          <th scope="col">' . $this->data['label'][2] . '</th>
                          </tr>
                      </thead>';
    }
    
    private function tableBodyStart()
    {
        echo '<tbody>';
    }
    
    private function tableBodyEnd()
    {
        echo '</tbody>
           </table>
          </div>';
    }
}