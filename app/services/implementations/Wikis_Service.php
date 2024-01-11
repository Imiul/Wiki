<?php 

    class Wikis_Service implements Wikis_Interface {


        private $db;

        public function __construct($db)
        {   
            $this->db = $db;
        }

        

        /* SHow All Categories */ 
        public function showWikis()
        {
            $sql = "
                SELECT * 
                FROM wikis 
            ";
            $pdo = $this->db->connect();
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $wikisData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $wikisData;
        }

        /* Show Latest Categories */ 
        public function getLatestWikis($limit)
        {
            $sql = "
                SELECT * 
                FROM wikis 
                ORDER BY addDate ASC
                LIMIT :limit
            ";
            $pdo = $this->db->connect();
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
            $stmt->execute();

            $wikisData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $wikisData;
        }

        /* GET WIKI DETAILS */ 
        public function getWikiDetails($id)
        {
            $sql = "
                SELECT * 
                FROM wikis 
                WHERE wikiId = :id
            ";
            $pdo = $this->db->connect();

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            
            $wikiData = $stmt->fetch(PDO::FETCH_ASSOC);
            return $wikiData;
        }

        /* GET WIKIS BY CATEGORY */ 
        public function getWikisByName($ctg)
        {
            $sql = "SELECT * FROM wikis WHERE categoryId = :ctg";
            $pdo = $this->db->connect();

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":ctg", $ctg);
            $stmt->execute();
            
            $wikisData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $wikisData;
        }


        /* DELETE WIKIS BY ID */
        public function deleteWikiById($id)
        {
            $sql = "DELETE FROM wikis WHERE wikiId = :id";
            $pdo = $this->db->connect();

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        }


        /* Add Wiki */
        public function addWiki(Wiki $wiki)
        {
            $id = $wiki->getWikiId();
            $title = $wiki->getTitle();
            $content = $wiki->getContent();
            $picture = $wiki->getPicture();
            $category = $wiki->getCategoryId();
            $addDate = $wiki->getAddDate();
            $addedBy = $wiki->getAddedBy();
            
            $sql = "
                INSERT INTO wikis (wikiId, title, content, picture, categoryId, addDate, addedBy)
                VALUES (:id, :title, :content, :picture, :categoryId, :addDate, :addedBy)
            ";

            $pdo = $this->db->connect();
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":content", $content);
            $stmt->bindParam(":picture", $picture);
            $stmt->bindParam(":categoryId", $category);
            $stmt->bindParam(":addDate", $addDate);
            $stmt->bindParam(":addedBy", $addedBy);

            $stmt->execute();
        }


        public function countWikis()
        {
            $sql = "
                SELECT COUNT(wikiId) AS Count
                FROM wikis
            ";

            $pdo = $this->db->connect();
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $CountWikis = $stmt->fetch(PDO::FETCH_ASSOC);
            return $CountWikis;
        }
    }

    ?>