<?php
require_once 'controllers/page_controller.class.php';


class Html_Doc /*extends Page_Controller*/
{

    protected $model;

    public function __construct($model)
    {
        // pass the data on to our parent class (BasicDoc)
        $this->model = $model;
        //parent::__construct($model);
    }

    public function Show()
    {
       $this -> showHtmlStart();
       $this -> showHeadStart();
       $this -> showHeadContent();
       $this -> showBodyStart();
       $this -> showBodyContent();
       $this -> showBodyEnd();
    }

    private function showHtmlStart(){
       echo '<!DOCTYPE html>
             <html>';
    }

    private function showHeadStart(){
        echo '<head>';
    }

    protected function showHeadContent(){
       echo '<meta charset="UTF-8">
             <meta name="viewport" content="width=device-width, initial-scale=1">
             <title>Royal sock shop</title>';
    }

    private function showBodyStart(){
       echo '</head>
             <body>';
    }

    protected function showBodyContent(){
        echo '<h1>whatsup</h1>';
    }

    private function showBodyEnd(){
       echo '</body></html>';
    }
}
?>
