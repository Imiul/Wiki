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

            $sql = "
                INSERT INTO users (UserId, firstName, lastName, username, email, password, role, addDate, lastLoginDate)
                VALUES (:id, :firstName, :lastName, :username, :email, :password, :role, :addDate, :lastLoginDate)
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
                        return $UserData;

                    } else {return false;}
                } else {
                    return false;
                }

            } catch (PDOException $e) {
                echo "ERROR LOGIN USER !!!" . $e->getMessage();
                return false;
            }
        }

        /* Update Last Loging Date */ 
        public function updateLASTLoginDate($userId)
        {
            
            $pdo = $this->db->connect();

            /* Update Last Login Date */ 
            $newDate = Date("Y-m-s H:i:s");
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

    }

    ?>