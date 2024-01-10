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