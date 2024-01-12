<?php

    interface User_Interface {


        /* User Only */ 
        public function register(User $user);

        /* Both */ 
        public function login($email, $password);
        public function updateLASTLoginDate($userId);   
        
        public function getUserInformation($id);

        public function deleteUserById($id);

        public function updateProfile($firstName, $lastName, $email, $id);
        public function updatePassword($password, $id);


        public function countAuthors();
        public function countAdmins();

        public function getAuthors();
        public function getAdmins();
    }

    ?>