<?php

require_once("./controllers/Main.controller.php");
require_once("controllers/Tools.controller.php");
require_once("controllers/Functions.controller.php");
require_once("./models/Workshop.model.php");

class WorkshopController extends MainController
{

    private $functions;
    private $workshopManager;
    public function __construct()
    {
        $this->functions = new Functions();
        // $this->workshopManager = new WorkshopManager(); à mettre en place
    }

    public function  workshopPage()
    {
        $data_page = [
            "page_description" => "Page de l'atelier",
            "page_title" => "VE | Atelier",
            "view" => "./views/pages/workshop.view.php",
            "template" => "./views/common/template.php",
        ];
        $this->functions->generatePage($data_page);
    }

}