<?php


    class View {

        public function loadView($file, $data = [])
        {
            $filePath = "../app/views/" . $file . ".php";


            /* Check If The File Exists */ 
            if (file_exists($filePath)) {
                require_once $filePath;

            } else {
                /* Handle Non Existing Files */ 
                echo "View Load Not Found \n <". $filePath . "> Not Found !!!!";
                die();
            }
        }
    }
?>