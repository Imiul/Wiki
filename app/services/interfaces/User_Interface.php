<?php

    interface User_Interface {


        /* User Only */ 
        public function register(User $user);

        /* Both */ 
        public function login($email, $password);
        public function updateLASTLoginDate($userId);   
        
        public function getUserInformation($id);
    }

    ?>