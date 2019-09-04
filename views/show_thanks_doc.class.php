<?php
require_once 'basic_doc.class.php';

class Show_Thanks_Doc extends Basic_Doc
{
    public function __construct($myData)
    {
        parent::__construct($myData);
    }
    
    protected function mainContent()
    {
        echo '<div class="row justify-content-center"><div class="col-sm-8 col-md-6 border border-dark m-2 p-1">
              <p>Thank you for sending me a message, '
              . $this->data['name'] . '. I shall respond to you shortly.</p>
              </div></div>';
    }
}