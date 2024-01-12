<?php

    class User_Service implements User_Interface {

        private $db;

        public function __construct(Database $db)
        {
            $this->db = $db;
        }




        /* Register New User */ 
        public function register(User $user) 
        {
            $userId = uniqid(mt_rand(), true);
            $firstName = $user->getFirstName();
            $lastName = $user->getLastName();
            $username = $user->getUsername();
            $email = $user->getEmail();
            $password = $user->getPassword();
            $role = $user->getRole();
            $addDate = $user->getAddDate();
            $lastLoginDate = $user->getLastLoginDate();
            $picture = $user->getPicture();

            $sql = "
                INSERT INTO users (UserId, firstName, lastName, username, email, password, role, addDate, lastLoginDate, picture)
                VALUES (:id, :firstName, :lastName, :username, :email, :password, :role, :addDate, :lastLoginDate, :picture)
            ";

            try {
                $pdo = $this->db->connect();
                $stmt = $pdo->prepare($sql);
                
                $stmt->bindParam(':id', $userId);
                $stmt->bindParam(':firstName', $firstName);
                $stmt->bindParam(':lastName', $lastName);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);
                $stmt->bindParam(':role', $role);
                $stmt->bindParam(':addDate', $addDate);
                $stmt->bindParam(':lastLoginDate', $lastLoginDate);
                $stmt->bindParam(':picture', $picture);

                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo "ERROR REGESTRING NEW USER !! " . $e->getMessage();
                return false;
            }

        }

        /* Login User */ 
        public function login($email, $password)
        {
            $sql = "SELECT * FROM users WHERE email = :email";

            try {
                $pdo = $this->db->connect();

                /* Verify User Email First */ 
                $stmt = $pdo->prepare($sql);
                $stmt->BindParam(":email", $email);
                $stmt->execute();

                $UserData = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($UserData) {
                    /* Verify Password */ 
                    if (password_verify($password, $UserData['password'])) {
                        return ['success' => true, 'data' => $UserData];

                    } else {return ['success' => false, 'data' => null];}
                } else {
                    return ['success' => false, 'data' => null];
                }

            } catch (PDOException $e) {
                echo "ERROR LOGIN USER !!!" . $e->getMessage();
            }
        }

        /* Update Last Loging Date */ 
        public function updateLASTLoginDate($userId)
        {
            
            $pdo = $this->db->connect();

            /* Update Last Login Date */ 
            $newDate = Date("Y-m-d H:i:s");
            $sql = "
                UPDATE users 
                SET lastLoginDate = :date
                WHERE UserId = :id
            ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":date", $newDate);
            $stmt->bindParam(":id", $userId);
            $stmt->execute();
        }





        /* Get User Information */ 
        public function getUserInformation($id)
        {
            $pdo = $this->db->connect();

            $sql = "
                SELECT *
                FROM users
                WHERE UserId = :id
            ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $userInfo = $stmt->fetch(PDO::FETCH_ASSOC);
            return $userInfo;
        }


        /* Get User Information */ 
        public function getUserWikis($id)
        {
            $pdo = $this->db->connect();

            $sql = "
                SELECT *
                FROM wikis
                WHERE addedBy = :id
            ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $UserWikis = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $UserWikis;
        }

        /* DELETE USER BY ID */
        public function deleteUserById($id)
        {
            $sql = "DELETE FROM users WHERE UserId = :id";

            $pdo = $this->db->connect();
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            
        }


        /* UPDATE USER PROFILE */ 
        public function updateProfile($firstName, $lastName, $email, $id)
        {
            $sql = "
                UPDATE users
                SET firstName = :firstName, lastName = :lastName, username = :username, email = :email
                WHERE UserId = :id
            ";

            $username = $firstName . "-" . $lastName . "-" . time();

            $pdo = $this->db->connect();
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(":firstName", $firstName);
            $stmt->bindParam(":lastName", $lastName);
            $stmt->bindParam(":username", $username); // Assuming you want to update the username as well
            $stmt->bindParam(":email", $email);

            $stmt->bindParam(":id", $id);
            $stmt->execute();
        }


        public function updatePassword($password, $id)
        {
            $sql = "
                UPDATE users
                SET password = :password
                WHERE UserId = :id
            ";

            $pdo = $this->db->connect();
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(":password", $password);
            $stmt->bindParam(":id", $id);

            $stmt->execute();
        }


        /* Count Users */
        public function countAuthors()
        {
            $sql = "
            SELECT COUNT(UserId) AS Count
            FROM users
            WHERE role = :role
            ";

            $pdo = $this->db->connect();
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":role", "User");
            $stmt->execute();

            $CountAuthors = $stmt->fetch(PDO::FETCH_ASSOC);
            return $CountAuthors;
        }


        /* Count Admins */
        public function countAdmins()
        {
            $sql = "
                SELECT COUNT(UserId) AS Count
                FROM users
                WHERE role = :role
            ";

            $pdo = $this->db->connect();
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":role", "Admin");
            $stmt->execute();

            $CountAdmins = $stmt->fetch(PDO::FETCH_ASSOC);
            return $CountAdmins;
        }

        /* Get Users */
        public function getAuthors()
        {
            $sql = "SELECT * FROM users WHERE role = :role";
            $pdo = $this->db->connect();
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":role", "User");
            $stmt->execute();

            $Users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $Users;
        }


        /* Get Admins */
        public function getAdmins()
        {
            $sql = "SELECT * FROM users WHERE role = :role";
            $pdo = $this->db->connect();
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":role", "Admin");
            $stmt->execute();

            $Admins = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $Admins;
        }
    }

    ?>