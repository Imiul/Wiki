<?php

    interface Wikis_Interface {


        public function showWikis();
        public function getLatestWikis($limit);


        public function getWikiDetails($id);
        
        public function getWikisByName($name);
        
        public function deleteWikiById($id);
    }

    ?>