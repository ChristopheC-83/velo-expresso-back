<?php 

require_once("./controllers/Main.controller.php");
require_once("controllers/Tools.controller.php");
require_once("controllers/Functions.controller.php");
require_once("./models/Home.model.php");


class HomeController extends MainController{


    private $functions;
    private $homeManager;
    public function __construct()
    {
        $this->functions = new Functions();
        $this->homeManager = new MainManager();
    }


    public function  slidersPage(){ 
    
        // $datasUser = $this->userManager->getUserInfo($_SESSION['profile']['login']);

        $data_page = [
            "page_description" => "Page de profil",
            "page_title" => "VE | Sliders",
            // "datasUser" => $datasUser,
            // "javascript" => ['fichier.js'],
            // "title_page" => "Profil de " . $_SESSION['profile']['login'],
            "view" => "./views/pages/home/sliders.view.php",
            "template" => "./views/common/template.php",
        ];
        $this->functions->generatePage($data_page);
         }
    
    
    }








