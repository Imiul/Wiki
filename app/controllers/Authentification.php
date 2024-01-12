<?php

    class Authentification extends View {

        /* Login Page ======  */ 
        public function login()
        {
            if (isset($_POST['login'])) {

                $email = $_POST['email'];
                $password = $_POST['password'];

                $db = new Database();
                $userService = new User_Service($db);

                $userData = $userService->login($email, $password);


                if ($userData['success']) {

                    $_SESSION['UserInfo'] = [
                        "id" => $userData['data']['UserId'],
                        "username" => $userData['data']['username'],
                        "firstName" => $userData['data']['firstName'],
                        "lastName" => $userData['data']['lastName'],
                        "role" => $userData['data']['role']
                    ];
    
                    $userService->updateLASTLoginDate($_SESSION['UserInfo']['id']);
    
                    switch ($_SESSION['UserInfo']['role']) {
                        case "User":
                            header("Location: /Wiki/Users/wikis");
                            die();
                            break;
                        case "Admin":
                            header("Location: /Wiki/Admin/dashboard");
                            die();
                            break;
                        default:
                            echo "REDIRECTION NOT WORKING !!";
                            break;
                    }

                }
            }

            /* Load A View */ 
            $data = ["pageTitle" => "Login Page"];
            $this->loadView("auth/login", $data);
        }


        /* Register Page ======  */ 
        public function Register()
        {
            /* Register Condition */ 
            if (isset($_POST['register'])) {

                $userId = uniqid(mt_rand(), true);
                $firstName = ucfirst($_POST['firstName']);
                $lastName = ucfirst($_POST['lastName']);
                $username = $firstName ."-". $lastName ."-". time();
                $email = $_POST['email'];
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $role = "User";
                $addDate = Date("Y-m-d H:i:s");
                $lastLoginDate = Date("Y-m-d H:i:s");
                
                
                /* handel image */
                $newPictureName = "img-" . time() . "-" . $_FILES["picture"]["name"];
                $newPath = __DIR__."/../../public/uploads/users/" . $newPictureName;
                $tmpFile = $_FILES["picture"]["tmp_name"];

                try {
                    // Move the uploaded file to the specified destination
                    move_uploaded_file($tmpFile, $newPath);
                } catch (PDOException $e) {
                    echo "ERROR UPLOADING IMAGE TO SERVER !! "  . $e->getMessage();
                    die();
                }

                $user = new User($userId, $firstName, $lastName, $username, $email, $password, $role, $addDate, $lastLoginDate, $newPictureName);
                $db = new Database();
                $userService = new User_Service($db);

                $userService->register($user);

                $_SESSION['UserInfo'] = [
                    "id" => $userId,
                    "username" => $username,
                    "firstName" => $firstName,
                    "lastName" => $lastName,
                    "role" => $role
                ];
                
                header("Location: /wiki/Users/wikis");
                die();
            }

            /* Load A View */ 
            $data = ["pageTitle" => "Register Page"];
            $this->loadView("auth/register", $data);
        }


        /* Logout Page ======  */ 
        public function logout()
        {
            session_unset();
            session_destroy();
            header("Location: /Wiki/Pages/home");
        }

        

        /* Error Page ======== */ 
        public function notFound() 
        {
            $this->loadView("error/404");
        }
    }

    ?>