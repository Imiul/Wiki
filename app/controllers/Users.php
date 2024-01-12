<?php

    class Users extends View {

        /* Wikis Page ======  */ 
        public function wikis()
        {
            if (!$_SESSION['UserInfo'] || $_SESSION['UserInfo']['role'] != "User" ) {
                header("Location: /Wiki/Authentification/login");
            }

            $id = $_SESSION['UserInfo']['id'];
            $db = new Database();
            $User_Service = new User_Service($db);
            $UserData = $User_Service->getUserWikis($id);

            /* Category */ 
            $Category_Service = new Categories_Service($db);
            $CategoryData = $Category_Service->showCategories();

            /* Tags */
            $Tags_Service = new Tags_Service($db);
            $tagsData = $Tags_Service->showTags();

            /* Wikis */
            $Wikis_Service = new Wikis_Service($db);


            /* Delete */ 
            if (isset($_POST['delete'])) {

                $id = $_POST['delete'];
                $Wikis_Service->deleteWikiById($id);
                header("Location: /Wiki/Users/wikis");
            }


            /* Add */ 
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
                $Wikis_Service->addWiki($Wiki);


                /* Handle Tags */
                $tagsOfWIki = $_POST['tags'];
                $tagsOfWiki_Service = new TagsOfWiki_Service($db);

                foreach($tagsOfWIki as $tagName) {

                    $id_2 = uniqid(mt_rand(), true);
                    $toInsert = new TagsOfWikis($id_2, $wikiId, $tagName);
                    $tagsOfWiki_Service->insertTagsOfWiki($toInsert);
                    header("Location: /Wiki/Users/wikis");

                }
            }


            /* Load A View */ 
            $data = [
                "pageTitle" => "Dashboard Page",
                'sectionTile_1' => "Explore Your Wikis",
                'sectionDescription_1' => "You Can Edit, Modify, Delete Your Own WIkis !",
                'userWikis' => $UserData,
                'categoryData' => $CategoryData,
                'tagsData' => $tagsData
            ];
            $this->loadView("user/wikis", $data);
        }


        /* myInfo Page ======  */
        public function myInfo()
        {
            if (!$_SESSION['UserInfo'] || $_SESSION['UserInfo']['role'] != "User" ) {
                header("Location: /Wiki/Authentification/login");
            }

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