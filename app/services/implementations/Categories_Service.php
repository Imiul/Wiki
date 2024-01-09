<?php 

    class Categories_Service implements Categories_Interface {

        private $db;

        public function __construct($db)
        {   
            $this->db = $db;
        }


        /* SHow All Categories */ 
        public function showCategories()
        {
            $sql = "
                SELECT * 
                FROM categories 
            ";
            $pdo = $this->db->connect();
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $categoryData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $categoryData;

        }

        /* Show Latest Categories */ 
        public function getLatestCategories($limit)
        {
            $sql = "
                SELECT * 
                FROM categories 
                ORDER BY addDate DESC
                LIMIT :limit
            ";
            $pdo = $this->db->connect();
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
            $stmt->execute();

            $categoryData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $categoryData;
        }
        
    }

    ?>