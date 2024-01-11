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
            
            /* Delete User */
            if (isset($_POST['deleteUser'])) {

                $id = $_POST['deleteUser'];
                $User_Service->deleteUserById($id);
                header("Location: /Wiki/Admin/users");
            }

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

            /* category */
            $db = new Database();
            $category_Service = new Categories_Service($db);
            $categoriesData = $category_Service->showCategories();

            /* Add Category */ 
            if (isset($_POST['addCategory'])) {

                $id = uniqid(mt_rand(), true);
                $date = date("Y-m-d h:i:s");

                $name = $_POST['categoryName'];
                $description = $_POST['categoryDescription'];
                
                /* Handel Image */
                $pictureNewName = "img-" . time() . $_FILES['picture']["name"];
                $newPath = __DIR__."/../../public/uploads/ctg/" . $pictureNewName;
                $tmp = $_FILES['picture']['tmp_name'];

                try {
                    move_uploaded_file($tmp, $newPath);
                } catch (PDOException $e) {
                    echo "ERROR UPLOADING IMAGE !!". $e->getMessage();
                    die();
                }

                $category = new Category($id, $name, $description, $pictureNewName, $date);
                $category_Service->addCategory($category);
                header("Location: /Wiki/Admin/categories");
            }

            /* Delete Category */ 
            if (isset($_POST['deleteCategory'])) {

                $id = $_POST['deleteCategory'];
                $category_Service->deleteCategory($id);
                header("Location: /Wiki/Admin/categories");
            }


            /* Load A View */ 
            $data = [
                "pageTitle" => "Categories Page",
                "specialName" => "Categories",
                "categoriesData" => $categoriesData
            ];
                $this->loadView("admin/categories", $data);
        }




        /* Dashboard Page ======  */ 
        public function tags()
        {

            $db = new Database();
            $tags_Service = new Tags_Service($db);
            $tagsData = $tags_Service->showTags();

            if (isset($_POST['addTag'])) {

                $name = $_POST['tagName'];
                $id = uniqid(mt_rand(), true);
                $date = date("Y-m-d h:i:s");
                $tag = new Tags($id, $name, $date);
                $tags_Service->addTag($tag);
                header("Location: /Wiki/Admin/tags");
            }

            if (isset($_POST['deleteTag'])) {

                $id = $_POST['deleteTag'];
                $tags_Service->deleteTag($id);
                header("Location: /Wiki/Admin/tags");
            }

            /* Load A View */ 
            $data = [
                "pageTitle" => "Tags Page",
                "tagsData" => $tagsData
            ];
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