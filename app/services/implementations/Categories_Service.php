<?php 

    class Categories_Service implements Categories_Interface {

        private $db;

        public function __construct(Database $db)
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


        /* Count Categories */
        public function countCategories()
        {
            $sql = "
                SELECT COUNT(categoryId) AS Count
                FROM categories
            ";

            $pdo = $this->db->connect();
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $CountCategory = $stmt->fetch(PDO::FETCH_ASSOC);
            return $CountCategory;
        }

        /* Delete Category */ 
        public function deleteCategory($id)
        {
            $sql = "DELETE FROM categories WHERE categoryId = :id";

            $pdo = $this->db->connect();
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        }

        /* Add Category */
        public function addCategory(Category $category)
        {

            $id = $category->getId();
            $name = $category->getName();
            $description = $category->getDescription();
            $picture = $category->getPicture();
            $addDate = $category->getAddDate();


            $sql = "
                INSERT INTO categories (categoryId, name, description, picture, addDate)
                VALUES (:id, :name, :description, :picture, :addDate)
            ";

            $pdo = $this->db->connect();
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':picture', $picture);
            $stmt->bindParam(':addDate', $addDate);
            $stmt->execute();
        }


        /* Category To Edit */ 
        public function editCategory($id, $name)
        {
            $sql = "
                UPDATE tags
                SET name = :name
                WHERE tagId = :id";

            $pdo = $this->db->connect();
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        }

        
        public function categoryInformation($id)
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
        
    }

    ?>