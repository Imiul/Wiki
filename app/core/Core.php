<?php

    class Core {

        private $isValid = false;

        /* GLobal Core Variables */ 
        private $currentController = "Pages"; 
        private $currentMethod = "home"; 
        private $params = []; 

        public function __construct()
        {
            /* Get Current Url */
            $url = $this->Url();

            /* Check If Selected Controller Exists */ 
            if (isset($url[0])) {
                if (file_exists('../app/controllers/' . $url[0] . '.php')) {
                    $this->currentController = ucwords($url[0]);
                    unset($url[0]);

                    $this->isValid = true;
                } else {

                    /* Handling Not Found Controllers */ 
                    http_response_code(404);
                    $url[0] = "errors";
                    $url[1] = "notFound";
                    $this->currentController = ucwords($url[0]);
                    unset($url[0]);
                    
                    $this->isValid = true;
                }
            }  
            
            /* Require Wanted Controller and Creating A new Instance From It */ 
            require_once '../app/controllers/' . $this->currentController . '.php';
            $this->currentController = new $this->currentController;


            /* Check If Selected Method Exists In Selected Controller*/ 
            if (isset($url[1])) {
                if (method_exists($this->currentController , $url[1])) {
                    $this->currentMethod = $url[1];
                } else {
                    /* Handling Not Found Method */
                    $url[1] = "notFound";
                    $this->currentMethod = $url[1];
                }
            } else {
                if ($this->isValid === true) {
                    $url[1] = "notFound";
                    $this->currentMethod = $url[1];
                }
            }
            
            $this->params = $url ? array_values($url) : [];

            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }

        /* Get Url Function */ 
        private function Url()
        {
            if (isset($_GET['url'])) {
                $url = explode('/', $_GET['url']);
                return $url;
            }
        }
    }

    ?>