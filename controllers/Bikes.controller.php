<?php

require_once("./controllers/Main.controller.php");
require_once("controllers/Tools.controller.php");
require_once("controllers/Functions.controller.php");
require_once("./models/Bikes.model.php");

class BikesController extends MainController
{

    private $functions;
    private $bikesManager;
    public function __construct()
    {
        $this->functions = new Functions();
        $this->bikesManager = new BikesManager();
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
