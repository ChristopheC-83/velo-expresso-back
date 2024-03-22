<?php

require_once("./controllers/Main.controller.php");
require_once("controllers/Tools.controller.php");
require_once("controllers/Functions.controller.php");
require_once("./models/Rental.model.php");

class RentalController extends MainController
{

    private $functions;
    private $rentalManager;
    public function __construct()
    {
        $this->functions = new Functions();
        $this->rentalManager = new RentalManager(); 
    }

    public function  rentalPage()
    {
        $data_page = [
            "page_description" => "Page des locations",
            "page_title" => "VE | Locations",
            "view" => "./views/pages/rental.view.php",
            "template" => "./views/common/template.php",
        ];
        $this->functions->generatePage($data_page);
    }

}