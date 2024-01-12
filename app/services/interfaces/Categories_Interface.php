<?php

    interface Categories_Interface {


        public function showCategories();
        public function getLatestCategories($limit);


        public function countCategories();

        public function deleteCategory($id);

        public function addCategory(Category $category);

        public function categoryInformation($id);
        public function editCategory($id, $name);

    }

    ?>