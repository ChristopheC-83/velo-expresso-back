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
        $this->workshopManager = new WorkshopManager();
    }

    public function  workshopPage()
    {
        $categories =$this->workshopManager->getCategories();

        $data_page = [
            "page_description" => "Page de l'atelier",
            "page_title" => "VE | Atelier",
            "view" => "./views/pages/workshop.view.php",
            "template" => "./views/common/template.php",
            "categories" => $categories
        ];
        $this->functions->generatePage($data_page);
    }
    public function sendNewCategory($new_category, $new_position)
    {
        if ($this->workshopManager->createNewCategory($new_category, $new_position)) {
            Tools::showAlert("La catégorie a bien été ajoutée", "alert-success");
            header('Location: ' . URL . 'admin/workshop_page');
        } else {
            Tools::showAlert("La catégorie n'a pas été ajoutée", "alert-danger");
            header('Location: ' . URL . 'admin/workshop_page');
        }
    }
}
