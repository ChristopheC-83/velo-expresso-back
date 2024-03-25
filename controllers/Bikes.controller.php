<?php

require_once("./controllers/Main.controller.php");
require_once("controllers/Tools.controller.php");
require_once("controllers/Functions.controller.php");
require_once("./models/Bikes.model.php");
require_once("./models/FeaturesBikes.model.php");

class BikesController extends MainController
{

    private $functions;
    private $bikesManager;
    private $featuresBikesManager;
    public function __construct()
    {
        $this->functions = new Functions();
        $this->bikesManager = new BikesManager();
        $this->featuresBikesManager = new FeaturesBikesManager();
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
    public function createBike (){ 

        $allDatasFeatures = $this->featuresBikesManager->getAllDatasFeatures();
        $allFeatures= $this->featuresBikesManager->getAllFeatures();
    
        $data_page = [
            "page_description" => "Page des vélos",
            "page_title" => "VE | Vélos",
            "view" => "./views/pages/bikes/createBike.view.php",
            "template" => "./views/common/template.php",
            "allDatasFeatures" => $allDatasFeatures,
            "allFeatures" => $allFeatures
        ];
        $this->functions->generatePage($data_page);
    
    }
}
