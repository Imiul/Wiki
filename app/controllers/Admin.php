<?php

    class Admin extends View {

        /* Dashboard Page ======  */ 
        public function dashboard()
        {
            if (!$_SESSION['UserInfo'] || $_SESSION['UserInfo']['role'] != "Admin" ) {
                header("Location: /Wiki/Authentification/login");
            }

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

            if (!$_SESSION['UserInfo'] || $_SESSION['UserInfo']['role'] != "Admin" ) {
                header("Location: /Wiki/Authentification/login");
            }

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
            if (!$_SESSION['UserInfo'] || $_SESSION['UserInfo']['role'] != "Admin" ) {
                header("Location: /Wiki/Authentification/login");
            }

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
            if (!$_SESSION['UserInfo'] || $_SESSION['UserInfo']['role'] != "Admin" ) {
                header("Location: /Wiki/Authentification/login");
            }

            $db = new Database();
            $tags_Service = new Tags_Service($db);
            $tagsData = $tags_Service->showTags();

            /* Add Tag */ 
            if (isset($_POST['addTag'])) {

                $name = $_POST['tagName'];
                $id = uniqid(mt_rand(), true);
                $date = date("Y-m-d h:i:s");
                $tag = new Tags($id, $name, $date);
                $tags_Service->addTag($tag);
                header("Location: /Wiki/Admin/tags");
            }

            /* Delete Tag */
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

            /* Update Tag */
            if (isset($_GET['update'])) {

                $id = $_GET['update'];
                echo "
                    <script>
                        document.addEventListener('DOMContentLoaded', () => {
                            document.getElementById('editTag').classList.remove('hidden');
                        });
                    </script>
                ";

                $tagData = $tags_Service->tagInformation($id);
                $data['tagData'] = $tagData;

                if (isset($_POST['updateTag'])) {
                    $name = $_POST['tagName'];
                    $tags_Service->editTag($id, $name);
                    header("Location: /Wiki/Admin/tags");
                }
            }

            $this->loadView("admin/tags", $data);
        }



        /* Dashboard Page ======  */ 
        public function Wikis()
        {
            if (!$_SESSION['UserInfo'] || $_SESSION['UserInfo']['role'] != "Admin" ) {
                header("Location: /Wiki/Authentification/login");
            }

            /* WIki */
            $db = new Database();
            $WIki_service = new Wikis_Service($db);
            $wikisData = $WIki_service->showWikis();

            /* Category service */
            $CategoryService = new Categories_Service($db);
            $categoryData = $CategoryService->showCategories();

            /* Tags SQERVICE */
            $TagsService = new Tags_Service($db);
            $tagsData = $TagsService->showTags();

            /* Delete Wiki */ 
            if (isset($_POST['deleteWiki'])) {
                $id = $_POST['deleteWiki'];
                $WIki_service->deleteWikiById($id);
                header("Location: /Wiki/Admin/wikis");
            }

            /* Archive WIki */ 
            if (isset($_POST['archiveWiki'])) {
                $id = $_POST['archiveWiki'];
                $WIki_service->archiveWiki($id);
                header("Location: /Wiki/Admin/wikis");
            }

            /* Add Wiki */ 
            if (isset($_POST['addWiki'])) {
                
                $wikiId = uniqid(mt_rand(), true);
                $title = $_POST['title'];
                $content = $_POST['content'];
                $categoryId = $_POST['category'];
                $addDate = date("Y-m-d H:i:s");
                $addedBy = $_SESSION['UserInfo']['id'];

                /* Handel Image */ 
                $newPictureName = "img-". time() . "-" . $_FILES['picture']["name"];
                $newPath = __DIR__."/../../public/uploads/wikis/" . $newPictureName;
                $tmpFile = $_FILES['picture']["tmp_name"];

                try {
                    move_uploaded_file($tmpFile, $newPath);
                } catch (PDOException $e) {
                    echo "ERROR UPLOADING IMAGE !! ". $e->getMessage();
                }

                $Wiki = new Wiki($wikiId, $title, $content,  $newPictureName, $categoryId, $addDate, $addedBy);
                $WIki_service->addWiki($Wiki);

                /* Handle Multiple Tags */
                $tagsOfWIki = $_POST['tags'];
                $tagsOfWiki_Service = new TagsOfWiki_Service($db);

                foreach($tagsOfWIki as $tagName) {

                    $id_2 = uniqid(mt_rand(), true);
                    $toInsert = new TagsOfWikis($id_2, $wikiId, $tagName);
                    $tagsOfWiki_Service->insertTagsOfWiki($toInsert);
                    header("Location: /Wiki/Admin/wikis");
                }
            }

            /* Load A View */ 
            $data = [
                "pageTitle" => "Wikis Page",
                "wikisData" => $wikisData,
                "categoryData" => $categoryData,
                "tagsData" => $tagsData
            ];
            $this->loadView("admin/wikis", $data);
        }


        /* Admins Page */
        public function admins()
        {
            if (!$_SESSION['UserInfo'] || $_SESSION['UserInfo']['role'] != "Admin" ) {
                header("Location: /Wiki/Authentification/login");
            }
            
            /* User Service */ 
            $db = new Database();
            $User_Service = new User_Service($db);


            /* Register Condition */ 
            if (isset($_POST['addAdmin'])) {

                $userId = uniqid(mt_rand(), true);
                $firstName = ucfirst($_POST['firstName']);
                $lastName = ucfirst($_POST['lastName']);
                $username = $firstName ."-". $lastName ."-". time();
                $email = $_POST['email'];
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $role = "Admin";
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

                $User_Service->register($user);
                
                header("Location: /Wiki/Admin/admins");
            }


            $AdminData = $User_Service->getAdmins();

            /* Load A View */ 
            $data = [
                "pageTitle" => "Wikis Page",
                "AdminData" => $AdminData
            ];
            $this->loadView("admin/admins", $data);
        }


        /* Settingd Page */
        public function settings()
        {
            $id = $_SESSION['UserInfo']['id'];

            $db = new Database();
            $User_Service = new User_Service($db);
            $userData = $User_Service->getUserInformation($id);

            if (isset($_POST['updateInfo'])) {
                
                $id = $_POST['Userid'];
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $email = $_POST['email'];
                $picture = $_FILES['picture'];

                $User_Service->updateProfile($firstName, $lastName, $email, $id);
                header("Location: /Wiki/Admin/settings");

            }

            if (isset($_POST['updatePassword'])) {

                $id = $_POST['Userid'];
                $password = password_hash($_POST['Newpassword'], PASSWORD_BCRYPT);

                $User_Service->updatePassword($password, $id);
            }

            /* Load A View */ 
            $data = [
                "pageTitle" => "Wikis Page",
                "userData" => $userData
            ];
            $this->loadView("admin/settings", $data);
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