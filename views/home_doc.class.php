<?php
require_once 'basic_doc.class.php';

class Home_Doc extends Basic_Doc
{
    //protected $model;


    public function __construct($model)
    {
      //
        // pass the data on to our parent class (BasicDoc)
        parent::__construct($model);
        //$this->model = $model;
    }

    // Override function from basicDoc
    protected function mainContent()
    {
      /*$a = Database_Model::findUserByEmail($this->model->email);
      var_dump($a);*/
      // var_dump($this->model->email);
      // var_dump($this->model->name);


        echo '<div class="row justify-content-center"><div class="col-sm-8 col-md-6 border border-dark m-2 p-1">
                    <p>Welkom op de website van Jurian van der Woude.
                    Ik hoop dat je hier kan vinden naar wat je op zoek bent!
                    Helaas is het op dit moment nog maar een lege pagina,
                    maar er komt in de toekomst nog van alles hierbij!</p>
                </div></div>';
    }
}
?>
