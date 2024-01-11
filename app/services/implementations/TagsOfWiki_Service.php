<?php

    class TagsOfWiki_Service implements TagsOfWiki_Interface {

        private $db;

        public function __construct(Database $db)
        {
            $this->db = $db;
        }



        public function insertTagsOfWiki(TagsOfWikis $TagsOfWikis)
        {

            $id = $TagsOfWikis->getId();
            $wikiId = $TagsOfWikis->getWikiId();
            $tagId = $TagsOfWikis->getTagId();


            $sql = "
                INSERT INTO tagsOfWiki (id, wikiId, tagId)
                VALUES (:id, :wikiId, :tagId)
            ";

            $pdo = $this->db->connect();
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":wikiId", $wikiId);
            $stmt->bindParam(":tagId", $tagId);

            $stmt->execute();
        }
    }
    ?>