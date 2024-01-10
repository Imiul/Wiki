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
                ORDER BY addDate DESC
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

    }

    ?>