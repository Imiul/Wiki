<?php

    class Admin extends View {

        /* Dashboard Page ======  */ 
        public function dashboard()
        {

            /* Load A View */ 
            $data = ["pageTitle" => "Dashboard Page"];
            $this->loadView("admin/dashboard", $data);
        }


        /* Dashboard Page ======  */ 
        public function users()
        {

            /* Load A View */ 
            $data = ["pageTitle" => "Users Page"];
            $this->loadView("admin/users", $data);
        }


        /* Dashboard Page ======  */ 
        public function categories()
        {

            /* Load A View */ 
            $data = ["pageTitle" => "Categories Page"];
            $this->loadView("admin/categories", $data);
        }


        /* Dashboard Page ======  */ 
        public function tags()
        {

            /* Load A View */ 
            $data = ["pageTitle" => "Tags Page"];
            $this->loadView("admin/tags", $data);
        }


        /* Dashboard Page ======  */ 
        public function Wikis()
        {

            /* Load A View */ 
            $data = ["pageTitle" => "Wikis Page"];
            $this->loadView("admin/wikis", $data);
        }



        /* Error Page ======== */ 
        public function notFound() 
        {
            /* Load A View */ 
            $data = ["pageTitle" => "WIki - Error Page (404)"];
            $this->loadView("error/404", $data);
        }
    }

    ?>