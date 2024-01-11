<?php

    class TagsOfWikis {

        public $id;
        public $wikiId;
        public $tagId;

        public function __construct($id, $wikiId, $tagId)
        {
            $this->id = $id;
            $this->wikiId = $wikiId;
            $this->tagId = $tagId;
        }

        
        /* GETTERS OINLY */
        public function getId()
        {
            return $this->id;
        }

        public function getWikiId() 
        {
            return $this->wikiId;
        }

        public function getTagId()
        {
            return $this->tagId;
        }
    }
    ?>