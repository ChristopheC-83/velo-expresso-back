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
    public function createBikePage (){ 

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

    public function sendNewBike( $infos_new_bike ){ 
        $imgBike = [
            'tmp_name'=> $infos_new_bike['bike_image_tmp'],
            'name'=> $infos_new_bike['bike_image_name'],
            'size'=> $infos_new_bike['bike_image_size']
        ];
        $infos_new_bike['picture']= Tools::addImage($imgBike, 'public/assets/images/bikes/');

        // Tools::showArray($infos_new_bike);
    
        if($this->bikesManager->createNewBikeDB($infos_new_bike)){
            Tools::showAlert("Le vélo a bien été ajouté", "alert-success");
            header('Location: ' . URL . 'admin/bikes/bikes_page');
        }  else{
            Tools::deleteImage( $infos_new_bike['picture'], 'public/assets/images/bikes/' );
            Tools::showAlert("Le vélo n'a pas pu être ajouté", "alert-danger");
            header('Location: ' . URL . 'admin/bikes/create_bike');
        }
    
    }
}
