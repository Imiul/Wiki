<?php

    class Tags {

        public $tagId;
        public $name;
        public $addDate;

        public function __construct($tagId, $name, $addDate)
        {
            $this->tagId = $tagId;
            $this->name = $name;
            $this->addDate = $addDate;
        }

        /* Getters Only */ 
        public function getTagId()
        {
            return $this->tagId;
        }

        public function getName()
        {
            return $this->name;
        }

        public function getAddDate()
        {
            return $this->addDate;
        }
    }

    ?>