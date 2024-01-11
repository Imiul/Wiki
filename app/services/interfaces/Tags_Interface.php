<?php

    interface Tags_Interface {

        public function showTags();

        public function countTags();

        public function addTag(Tags $tag);

        public function deleteTag($id);
    }

    ?>