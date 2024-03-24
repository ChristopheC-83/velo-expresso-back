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

    public function  rentalsPage()
    {
        $data_page = [
            "page_description" => "Page des locations",
            "page_title" => "VE | Locations",
            "view" => "./views/pages/rental/allRentals.view.php",
            "template" => "./views/common/template.php",
        ];
        $this->functions->generatePage($data_page);
    }
    public function  addRental()
    {
        $data_page = [
            "page_description" => "Page d'ajout d'une location",
            "page_title" => "VE | Ajout Location",
            "view" => "./views/pages/rental/addRental.view.php",
            "template" => "./views/common/template.php",
        ];
        $this->functions->generatePage($data_page);
    }

    public function  sendNewRental($item, $position, $half_day, $day, $extra_day, $week){
    
      

    //  test nom item isDispo
        if($this->rentalManager->addRentalDB($item, $position, $half_day, $day, $extra_day, $week)){
            Tools::showAlert("L'ajout a bien été effectué", "alert-success");
            header('Location: ' . URL . 'admin/rental/rentals_page');
        } else {
            Tools::showAlert("L'ajout n'a pas été effectué", "alert-danger");
            header('Location: ' . URL . 'admin/rental/add_rental_page');
        }


    }


















    public function  textUnderArrayRentals()
    {
        $data_page = [
            "page_description" => "Page du texte sous locations",
            "page_title" => "VE | texte Locations",
            "view" => "./views/pages/rental/textUnderArray.view.php",
            "template" => "./views/common/template.php",
        ];
        $this->functions->generatePage($data_page);
    }

}