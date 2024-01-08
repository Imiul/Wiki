<?php

    class Authentification extends View {

        /* Login Page ======  */ 
        public function login()
        {

            /* Load A View */ 
            $data = ["pageTitle" => "Login Page"];
            $this->loadView("auth/login", $data);
        }


        /* Register Page ======  */ 
        public function register()
        {
            
            /* Load A View */ 
            $data = ["pageTitle" => "Register Page"];
            $this->loadView("auth/register", $data);
        }


        /* Error Page ======== */ 
        public function notFound() 
        {
            $this->loadView("error/404");
        }
    }

    ?>