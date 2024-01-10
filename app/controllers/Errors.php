<?php

    class Errors extends View {

        /* notFound Page (404) ======== */ 
        public function notFound()
        {
            /* Load A View */ 
            $data = ["pageTitle" => "WIki - Error Page (404)"];
            $this->loadView("error/404", $data);
        }
    }

    ?>