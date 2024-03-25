<?php

require_once("./controllers/Main.controller.php");
require_once("controllers/Tools.controller.php");
require_once("controllers/Functions.controller.php");
require_once("./models/Home.model.php");


class HomeController extends MainController
{


    private $functions;
    private $homeManager;
    public function __construct()
    {
        $this->functions = new Functions();
        $this->homeManager = new HomeManager();  
    }


    public function  slidersPage()
    {

        // $datasUser = $this->userManager->getUserInfo($_SESSION['profile']['login']);

        $data_page = [
            "page_description" => "Page des sliders",
            "page_title" => "VE | Sliders",
            // "datasUser" => $datasUser,
            // "javascript" => ['fichier.js'],
            "view" => "./views/pages/home/sliders.view.php",
            "template" => "./views/common/template.php",
        ];
        $this->functions->generatePage($data_page);
    }




    public function  opinionsPage()
    {
        $data_page = [
            "page_description" => "Page des Avis",
            "page_title" => "VE | Avis",
            "view" => "./views/pages/home/opinions.view.php",
            "template" => "./views/common/template.php",
        ];
        $this->functions->generatePage($data_page);
    }
    public function  framesPage()
    {
        $data_page = [
            "page_description" => "Page des cadres",
            "page_title" => "VE | Cadres",
            "view" => "./views/pages/home/frames.view.php",
            "template" => "./views/common/template.php",
        ];
        $this->functions->generatePage($data_page);
    }
}
