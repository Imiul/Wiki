<?php

    class Users extends View {


        /* Wikis Page ======  */ 
        public function wikis()
        {
            
            $id = $_SESSION['UserInfo']['id'];
            $db = new Database();
            $User_Service = new User_Service($db);
            $UserData = $User_Service->getUserWikis($id);

            if (isset($_POST['delete'])) {

                $id = $_POST['delete'];
                $Wikis_Service = new Wikis_Service($db);
                $Wikis_Service->deleteWikiById($id);
                header("Location: /Wiki/Users/wikis");
            }

            /* Load A View */ 
            $data = [
                "pageTitle" => "Dashboard Page",
                'sectionTile_1' => "Explore Your Wikis",
                'sectionDescription_1' => "You Can Edit, Modify, Delete Your Own WIkis !",
                'userWikis' => $UserData
            ];
            $this->loadView("user/wikis", $data);
        }


        /* myInfo Page ======  */
        public function myInfo()
        {

            $id = $_SESSION['UserInfo']['id'];
            $db = new Database();
            $User_Service = new User_Service($db);
            $UserData = $User_Service->getUserInformation($id);

            if (isset($_POST['deleteAccount'])) {
                $id = $_POST['deleteAccount'];
                $User_Service->deleteUserById($id);
                header("Location: /Wiki/Authentification/login");
            }   

            if (isset($_POST['updateInfo'])) {
                
                $id = $_POST['Userid'];
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $email = $_POST['email'];
                $picture = $_FILES['picture'];

                $User_Service->updateProfile($firstName, $lastName, $email, $id);
                header("Location: /Wiki/Users/myInfo");

            }

            if (isset($_POST['updatePassword'])) {

                $id = $_POST['Userid'];
                $password = password_hash($_POST['Newpassword'], PASSWORD_BCRYPT);

                $User_Service->updatePassword($password, $id);
            }


            /* Load A View */ 
            $data = [
                "pageTitle" => "Dashboard Page",
                'sectionTile_1' => "My Profile",
                'sectionDescription_1' => "You Can Update Or Delete Your Profile !",
                'userData' => $UserData
            ];
            $this->loadView("user/my-info", $data);
        }


        /* Error Page ======== */ 
        public function notFound() 
        {
            /* Load A View */ 
            $data = ["pageTitle" => "WIki - Error Page (404)"];
            $this->loadView("error/404", $data);
        }
    }

    ?>