<?php

    class Admin extends View {

        /* Dashboard Page ======  */ 
        public function dashboard()
        {
            // if (!$_SESSION['UserInfo'] || $_SESSION['UserInfo']['role'] != "Admin" ) {
            //     header("Location: /Wiki/Authentification/login");
            // }

            $db = new Database();
            
            /* Category */
            $category_Service = new Categories_Service($db);
            $ctgNumber = $category_Service->countCategories();

            /* Tags */
            $tags_Service = new Tags_Service($db);
            $tagsNumber = $tags_Service->countTags();

            /* Wikis */
            $wikis_Service = new Wikis_Service($db);
            $wikisNumber = $wikis_Service->countWikis();

            /* Users */
            $users_Service = new User_Service($db);
            $authorsNumber = $users_Service->countAuthors();
            $AdminsNumber = $users_Service->countAdmins();

            /* Load A View */ 
            $data = [
                "pageTitle" => "Dashboard Page",
                "CategoryNumber" => $ctgNumber,
                "TagsNumber" => $tagsNumber,
                "WikisNumber" => $wikisNumber,
                "AuthorsNumber" => $authorsNumber,
                "AdminsNumber" => $AdminsNumber
            ];
            $this->loadView("admin/dashboard", $data);
        }



        /* Dashboard Page ======  */ 
        public function users()
        {

            $db = new Database();
            $User_Service = new User_Service($db);
            $UsersData = $User_Service->getAuthors();

            /* Load A View */ 
            $data = [
                "pageTitle" => "Users Page",
                "UsersData" => $UsersData
            ];
            $this->loadView("admin/users", $data);
        }


        /* Dashboard Page ======  */ 
        public function categories()
        {

            /* Load A View */ 
            $data = [
                "pageTitle" => "Categories Page",
                "specialName" => "Categories"
            ];
                $this->loadView("admin/categories", $data);
        }


        /* Dashboard Page ======  */ 
        public function tags()
        {

            /* Load A View */ 
            $data = ["pageTitle" => "Tags Page"];
            $this->loadView("admin/tags", $data);
        }


        /* Dashboard Page ======  */ 
        public function Wikis()
        {

            /* Load A View */ 
            $data = ["pageTitle" => "Wikis Page"];
            $this->loadView("admin/wikis", $data);
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