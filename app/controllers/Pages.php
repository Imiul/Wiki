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
                'sectionTile_1' => "All Categories",
                'sectionDescription_1' => "Explore our diverse range of categories !",
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
                $WikisData = $Wikis_Service->showNonArchivedWikis();
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
            if (isset($_GET['wikiId'])) {

                $wikiId = $_GET['wikiId'];
                $db = new Database();

                /* WIki Data */ 
                $Wikis_Service = new Wikis_Service($db);
                $WikisData = $Wikis_Service->getWikiDetails($wikiId);

                /* Wikis Data */ 
                $Wikis_Service = new Wikis_Service($db);
                $LatestWikis = $Wikis_Service->getLatestWikis(4);

                $data = [
                    'pageTitle' => 'Wikis Page',
                    'sectionTile_1' => "Wiki Details",
                    'sectionDescription_1' => "Become Smart By Reading From The Best Authors",
                    'ArticleData' => $WikisData,
                    'LatestWikis' => $LatestWikis
                ];

                $this->loadView('pages/wiki-details' , $data );
            }
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