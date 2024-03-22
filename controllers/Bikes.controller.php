<?php

require_once("./controllers/Main.controller.php");
require_once("controllers/Tools.controller.php");
require_once("controllers/Functions.controller.php");
require_once("./models/Bikes.model.php");

class BikesController extends MainController
{

    private $functions;
    private $homeManager;
    public function __construct()
    {
        $this->functions = new Functions();
        // $this->bikesManager = new BikesManager(); à mettre en place
    }

    public function  featuresPage()
    {
        $data_page = [
            "page_description" => "Page des caractéristiques",
            "page_title" => "VE | Caractéristiques",
            "view" => "./views/pages/bikes/features.view.php",
            "template" => "./views/common/template.php",
        ];
        $this->functions->generatePage($data_page);
    }
    public function  bikesPage()
    {
        $data_page = [
            "page_description" => "Page des vélos",
            "page_title" => "VE | Vélos",
            "view" => "./views/pages/bikes/bikes.view.php",
            "template" => "./views/common/template.php",
        ];
        $this->functions->generatePage($data_page);
    }
}
