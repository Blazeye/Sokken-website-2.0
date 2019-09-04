<?php
    require_once 'html_doc.class.php';

    class Basic_Doc extends Html_Doc{
        //protected $model;

        public function __construct($model)
        {
            // pass the data on to our parent class (BasicDoc)
            parent::__construct($model);
        }

        protected function title(){
            echo "<title>My website -" . $this->model->page . "</title>";
        }

        private   function metaAuthor(){
            echo '<meta charset="UTF-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1">';
        }
        private   function cssLinks(){
            echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
                  <link rel="stylesheet" type="text/css" href="stylesheet.css">';
        }

        private   function bootstrapScript(){
            echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
                  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>';
        }

        private function bodyHeader()
        {
            echo '<header>
                   <div class="container">
                     <div class="jumbotron d-none d-lg-block text-center">
                        <span class="display-3"><b>Royal sock shop</b></span>
                     </div>
                     <div class="d-lg-none">
                        <h1 class="title mb-0 mt-1">Royal sock shop</h1>
                     </div>

                     <div id="cloud-circle"></div>
                     <svg width="0" height="0">
                        <filter id="filter">
                           <feTurbulence type="fractalNoise" baseFrequency=".01" numOctaves="10" />
                           <feDisplacementMap in="SourceGraphic" scale="180" />
                        </filter>
                     </svg>
                     <span><h2>' . $this->model->page . '</h2></span>
                     <span class="catchphrase font-italic">
                        <p>Royal sock shop, het beste dat jij jouw voeten kan bieden!</p>
                     </span>
                  </header>';
        }

        private function mainMenu()
        {
          echo
             '<nav class="navbar navbar-expand-sm bg-primary justify-content-center m-0 p-0 responsive-with-vw-increasing_width">
              <ul class="navbar-nav">';

              foreach($this->model->menu as $x => $menu_array)
             {
               echo '<li class="nav-item"><a href="index.php?page=' . $x . '" title="' . $menu_array['title'] . '" class="' .
               $menu_array['class'] . '">' . $menu_array['text'] . '</a></li>';
             }

         echo
             '</ul>
              </nav>';
        }

        protected function mainContent() {}

        private   function bodyFooter()
        {
            echo'<footer>
                    <div class="small font-italic text-right">Icons made by <a href="https://www.flaticon.com/authors/stephen-hutchings" title="Stephen Hutchings">Stephen Hutchings</a> from <a href="https://www.flaticon.com/"
                       title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/"
                       title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a>
                    </div>
                    <div class=" bg-dark text-white text-right small">
                       <p class="mb-0">&copy; Jurian van der Woude </P>
                       <p class="">&nbsp; 26-06-2019 </p>
                    </div>
                 </footer>';
        }

        // Override function from htmlDoc
        protected function showHeadContent()
        {
            $this->title();
            $this->metaAuthor();
            $this->cssLinks();
        }

        // Override function from htmlDoc
        protected function showBodyContent()
        {
            $this->bodyHeader();
            $this->mainMenu();
            $this->mainContent();
            $this->bodyFooter();
        }
    }
?>
