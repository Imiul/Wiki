<?php

    class User {

        public $userId;
        public $firstName;
        public $lastName;
        public $username;
        public $email;
        public $password;
        public $role;
        public $addDate;
        public $lastLoginDate;

        public function __construct($userId, $firstName, $lastName, $username, $email, $password, $role, $addDate, $lastLoginDate)
        {
            $this->userId = $userId;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
            $this->role = $role;
            $this->addDate = $addDate;
            $this->lastLoginDate = $lastLoginDate;
        }

        /* Getters Only */ 
        public function getUserId()
        {
            return $this->userId;
        }

        public function getFirstName()
        {
            return $this->firstName;
        }

        public function getLastName()
        {
            return $this->lastName;
        }

        public function getUsername()
        {
            return $this->username;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function getRole()
        {
            return $this->role;
        }

        public function getAddDate()
        {
            return $this->addDate;
        }

        public function getLastLoginDate()
        {
            return $this->lastLoginDate;
        }

    }

    ?>