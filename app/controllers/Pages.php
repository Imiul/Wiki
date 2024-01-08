<?php

    class Pages extends View{


        /* Home Page ======== */ 
        public function home() 
        {

            $data = [
                'PageTitle' => 'Wiki Home page',
            ];
            
            $this->loadView('pages/home' , $data);
        }


        /* Categories Page ======== */ 
        public function categories()
        {
            
            $data = [
                'PageTitle' => 'Wiki Home page'
            ];
            
            $this->loadView('pages/categories' , $data );
        }


        /* Wikis Page ======== */ 
        public function wikis()
        {
            $data = [
                'PageTitle' => 'Wikis Page',
            ];
            
            $this->loadView('pages/wikis' , $data );
        }


        /* Wikis Details Page ======== */ 
        public function wikiDetails()
        {
            $data = [
                'PageTitle' => 'Wikis Page',
            ];
            
            $this->loadView('pages/wiki-details.php' , $data );
        }



        /* Error Page ======== */ 
        public function notFound() 
        {
            $this->loadView("error/404");
        }
    }
    ?>