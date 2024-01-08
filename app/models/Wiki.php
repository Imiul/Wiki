<?php

    class Wiki {

        public $wikiId;
        public $title;
        public $content;
        public $picture;
        public $categoryId;
        public $addDate;
        public $addedBy;

        public function __construct($wikiId, $title, $content, $picture, $categoryId, $addDate, $addedBy)
        {
            $this->wikiId = $wikiId;
            $this->title = $title;
            $this->content = $content;
            $this->picture = $picture;
            $this->categoryId = $categoryId;
            $this->addDate = $addDate;
            $this->addedBy = $addedBy;
        }

        /* Getters Only */ 
        public function getWikiId()
        {
            return $this->wikiId;
        }

        public function getTitle()
        {
            return $this->title;
        }

        public function getContent()
        {
            return $this->content;
        }

        public function getPicture()
        {
            return $this->picture;
        }

        public function getCategoryId()
        {
            return $this->categoryId;
        }

        public function getAddDate() 
        {
            return $this->addDate;
        }

        public function getAddedBy()
        {
            return $this->addedBy;
        }
    }

    ?>