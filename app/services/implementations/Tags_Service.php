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

        
    }

    ?>