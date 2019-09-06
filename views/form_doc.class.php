<?php
include_once 'basic_doc.class.php';

abstract class Form_Doc extends Basic_Doc
{
    public function __construct($model)
    {
        parent::__construct($model);
    }

    protected function mainContent()
    {
      $this->createForm();
    }

    protected function createForm()
    {
        $this->formStart();
        $this->formContent();
        $this->formEnd();
    }

    public static function getArrayVar($array, $key, $default='')
    {
        return isset($array[$key]) ? $array[$key] : $default;
    }

    protected function formStart()
    {
        echo '<form action="index.php" method="POST" class="d-inline m-0 p-0">';
    }

    protected function createInput( $type='', $class='',$error='', $label='', $placeholder='', $name='', $value='')
    {
      if(!empty($label))
      {
        echo '<label for="' . $name . '">' . $label . '</label>';
      }
      switch($type)
      {
         case 'textarea':
            echo '<textarea cols="24" rows="8" placeholder="' . $placeholder .
            '" id="' . $name . '" name="' . $name . '" class="' . $class . '">' . $name . '</textarea>';
            break;
         case 'div_start':
            echo '<div class=' . $class . '>';
            break;
         case 'div_end':
            echo '</div>';
            break;
         default:
            echo '<input type="' . $type . '" placeholder="' . $placeholder .
            '" id="' . $name . '" name="' . $name . '" class="' . $class . '" value="' . $value . '"/>';
            break;
       }

       if(!$this->model->valid)
       {
         echo '<div class="error small text-muted bg-danger' . $class . '">' . $error . '</div>';
       }
    }





    protected function formEnd()
    {
        echo '</form>';
    }

}
?>
