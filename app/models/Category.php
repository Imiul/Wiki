<?php

    class Category {

        public $categoryId;
        public $name;
        public $description;
        public $picture;
        public $addDate;

        public function __construct($categoryId, $name, $description, $picture, $addDate)
        {
            $this->categoryId = $categoryId;
            $this->name = $name;
            $this->description = $description;
            $this->picture = $picture;
            $this->addDate = $addDate;
        }

        /* Getters Only  */ 
        public function getId()
        {
            return $this->categoryId;
        }

        public function getName()
        {
            return $this->name;
        }

        public function getDescription()
        {
            return $this->description;
        }

        public function getPicture()
        {
            return $this->picture;
        }

        public function getAddDate()
        {
            return $this->addDate;
        }
        
    }

    ?>