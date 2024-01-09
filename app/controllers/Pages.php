<?php

    class Pages extends View{


        /* Home Page ======== */ 
        public function home() 
        {
            
            $db = new Database();
            
            /* Category Data */ 
            $Categories_Service = new Categories_Service($db);
            $LatestCategory = $Categories_Service->getLatestCategories(4);

            /* Wikis Data */ 
            $Wikis_Service = new Wikis_Service($db);
            $LatestWikis = $Wikis_Service->getLatestWikis(4);

            $data = [
                'pageTitle' => 'Wiki Home page',
                'sectionTile_1' => "Latest Categories",
                'sectionDescription_1' => "Explore our diverse range of categories",
                'LatestCategory' => $LatestCategory,
                'LatestWikis' => $LatestWikis
            ];
            $this->loadView('pages/home' , $data);
        }


        /* Categories Page ======== */ 
        public function categories()
        {
            $db = new Database();
            
            /* Category Data */ 
            $Categories_Service = new Categories_Service($db);
            $CategoryData = $Categories_Service->showCategories();

            $data = [
                'pageTitle' => 'Wiki Home page',
                'sectionTile_1' => "Latest Categories",
                'sectionDescription_1' => "Explore our diverse range of categories",
                'CategoryData' => $CategoryData
            ];
            
            $this->loadView('pages/categories' , $data );
        }


        /* Wikis Page ======== */ 
        public function wikis()
        {
            $db = new Database();
            $Wikis_Service = new Wikis_Service($db);

            /* WIki Data */ 
            if (isset($_GET['category'])) {

                $categoryName = $_GET['category'];
                $WikisData = $Wikis_Service->getWikisByName($categoryName);
            } else {
                $WikisData = $Wikis_Service->showWikis();
            }


            $data = [
                'pageTitle' => 'Wikis page',
                'WikisData' => $WikisData
            ];
            
            $this->loadView('pages/wikis' , $data );
        }


        /* Wikis Details Page ======== */ 
        public function wikiDetails()
        {
            $articleId = $_GET['articleId'] ?? NULL;
            $db = new Database();
            
            /* WIki Data */ 
            $Wikis_Service = new Wikis_Service($db);
            $WikisData = $Wikis_Service->getWikiDetails($articleId);


            $data = [
                'pageTitle' => 'Wikis Page',
                'ArticleData' => $WikisData
            ];
            
            $this->loadView('pages/wiki-details.php' , $data );
        }


        /* Error Page ======== */ 
        public function notFound() 
        {
            $this->loadView("error/404");
        }
    }
    ?>