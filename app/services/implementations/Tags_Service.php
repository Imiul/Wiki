<?php

    class Tags_Service implements Tags_Interface {

        private $db;

        public function __construct(Database $db)
        {
            $this->db = $db;
        }


        /* SHOW TAGS */
        public function showTags()
        {
            $sql = "SELECT * FROM tags";

            $pdo = $this->db->connect();
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $TagsData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $TagsData;
        }



        /* Count Tags */
        public function countTags()
        {
            $sql = "
                SELECT COUNT(tagId) AS Count
                FROM tags
            ";

            $pdo = $this->db->connect();
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $CountTags = $stmt->fetch(PDO::FETCH_ASSOC);
            return $CountTags;
        }


        /* Add Tags */
        public function addTag(Tags $tag)
        {
            $sql = "
                INSERT INTO tags (tagId, name, addDate)
                VALUES (:id, :tagname, :addDate)
            ";

            $id = $tag->getTagId();
            $name = $tag->getName();
            $addDate = $tag->getAddDate();

            $pdo = $this->db->connect();
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":tagname", $name);
            $stmt->bindParam(":addDate", $addDate);

            $stmt->execute();
        }


        /* Delete Tags */
        public function deleteTag($id)
        {
            $sql = "DELETE FROM tags WHERE tagId = :id";

            $pdo = $this->db->connect();
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        }


        /* get tag information */ 
        public function tagInformation($id)
        {
            $sql = "
                SELECT * 
                FROM tags 
                WHERE tagId = :id
            ";
            $pdo = $this->db->connect();
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $tagData = $stmt->fetch(PDO::FETCH_ASSOC);
            return $tagData;
        }

        /* edit tags */
        public function editTag($id, $name)
        {
            $sql = "
                UPDATE tags
                SET name = :name
                WHERE tagId = :id
            ";

            $pdo = $this->db->connect();
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        }
    }

    ?>