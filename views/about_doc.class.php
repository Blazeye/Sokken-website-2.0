<?php
require_once 'basic_doc.class.php';

class About_Doc extends Basic_Doc
{
    public function __construct($myData){
        parent::__construct($myData);
    }

    protected function mainContent(){
        echo '<div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3 border border-dark m-2"">
                <address>
Geschreven door Jurian van der Woude.
Vind me op:
Zwanebloemweg, Haren
Provincie Groningen
                </address>
                <p>Lievelingszin: <q>Het gaat wel.</q></p>
                <p>Hobbies:</p>
                <ul>
                    <li><p>figurines verven</p></li>
                    <li><p>Wuxia lezen</p></li>
                    <li><p>rock, punk, rap en klassieke muziek</p></li>
                </ul>
            </div>
            <div class="col">
            <img class="medium_size img-fluid rounded my-2 mx-auto d-block" src="images/face.jpg" alt="image cannot load"/>
            </div>
            </div>';
    }
}
?>
