<?php 

    /* Create Database Class */ 
    class Database {

        private $dbconnection;
        private static $pdo;
        
        private const DSN = "mysql:host=localhost;port=3306;dbname=Wikis;charset=utf8";
        private const USERNAME = "root";
        private const PASSWORD = "root";

        public function __construct()
        {
            $this->connect();
        }

        /* Connect FUnction */ 
        public function connect()
        {
            try {
                /* Check If There Is An Instance Alredy */ 
                if (is_null(static::$pdo)) {
                    $this->dbconnection = new PDO(self::DSN, self::USERNAME, self::PASSWORD);
                    static::$pdo = $this->dbconnection;
                } 
                return static::$pdo;
            } catch (PDOException $e) {
                echo "ERROR CONNECTING TO THE DATABASE !!" . $e->getMessage();
            }
        }
    }

?>