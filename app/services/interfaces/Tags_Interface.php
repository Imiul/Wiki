<?php

    interface Tags_Interface {

        public function showTags();

        public function countTags();

        public function addTag(Tags $tag);

        public function deleteTag($id);

        public function tagInformation($id);
        public function editTag($id, $name);
    }

    ?>