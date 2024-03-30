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
        $rentals = $this->rentalManager->getRentals();

        $data_page = [
            "page_description" => "Page des locations",
            "page_title" => "VE | Locations",
            "view" => "./views/pages/rental/allRentals.view.php",
            "template" => "./views/common/template.php",
            "rentals" => $rentals
        ];
        $this->functions->generatePage($data_page);
    }

    public function  sendNewRental($name, $position, $half_day, $day, $extra_day, $week)
    {
        if (!$this->rentalManager->isNameFreeGeneric($name, "rentals")) {
            Tools::showAlert("Ce nom est déjà pris, Merci d'en changer.", "alert-warning");
            header('Location: ' . URL . 'admin/rental/rentals_page/');
            return;
        }

        if (!$this->rentalManager->isPositionFreeGeneric($position, "rentals")) {
            Tools::showAlert("Cette position est déjà prise, Merci d'en changer.", "alert-warning");
            header('Location: ' . URL . 'admin/rental/rentals_page/');
            return;
        }

        if ($this->rentalManager->addRentalDB($name, $position, $half_day, $day, $extra_day, $week)) {
            Tools::showAlert("L'ajout a bien été effectué", "alert-success");
            header('Location: ' . URL . 'admin/rental/rentals_page');
        } else {
            Tools::showAlert("L'ajout n'a pas été effectué", "alert-danger");
            header('Location: ' . URL . 'admin/rental/rentals_page');
        }
    }

    public function modifyRental($id)
    {

        $rentalToUpdate = $this->rentalManager->getRentalById($id);

        $data_page = [
            "page_description" => "Page d'ajout d'une location",
            "page_title" => "VE | Ajout Location",
            "view" => "./views/pages/rental/modifyRental.view.php",
            "template" => "./views/common/template.php",
            "rentalToUpdate" => $rentalToUpdate
        ];
        $this->functions->generatePage($data_page);
    }

    public function  updateRental($id, $name, $position, $half_day, $day, $extra_day, $week)
    {
        $old_name = $this->rentalManager->getRentalById($id)['name'];
        $old_position = $this->rentalManager->getRentalById($id)['position'];

        if (!$this->rentalManager->isNameFreeGeneric($name, "rentals") && $name !== $old_name) {
            Tools::showAlert("Ce nom est déjà pris, Merci d'en changer.", "alert-warning");
            header('Location: ' . URL . 'admin/rental/modify_rental/' . $id);
            return;
        }
        if (!$this->rentalManager->isPositionFreeGeneric($position, "rentals") && $position != $old_position) {
            Tools::showAlert("Cette position est déjà prise, Merci d'en changer.", "alert-warning");
            header('Location: ' . URL . 'admin/rental/modify_rental/' . $id);
            return;
        }

        if ($this->rentalManager->updateRentalDB($id, $name, $position, $half_day, $day, $extra_day, $week)) {
            Tools::showAlert("La modification a bien été effectuée", "alert-success");
            header('Location: ' . URL . 'admin/rental/rentals_page');
        } else {
            Tools::showAlert("La modification n'a pas été effectuée", "alert-danger");
            header('Location: ' . URL . 'admin/rental/modify_rental/' . $id);
        }
    }

    public function  deleteRental($id)
    {
        if ($this->rentalManager->deleteRentalDB($id)) {
            Tools::showAlert("La suppression a bien été effectuée", "alert-success");
            header('Location: ' . URL . 'admin/rental/rentals_page');
        } else {
            Tools::showAlert("La suppression n'a pas été effectuée", "alert-danger");
            header('Location: ' . URL . 'admin/rental/rentals_page');
        }
    }










    public function  textUnderArrayRentals()
    {
        $text = $this->rentalManager->getTextUnderArrayRentals()['text_rental'];

        $data_page = [
            "page_description" => "Page du texte sous locations",
            "page_title" => "VE | texte Locations",
            "view" => "./views/pages/rental/textUnderArray.view.php",
            "template" => "./views/common/template.php",
            "text" => $text
        ];
        $this->functions->generatePage($data_page);
    }

    public function sendTextUnderRental($text)
    {

        if ($this->rentalManager->updateTextUnderArrayRentals($text)) {
            Tools::showAlert("La modification a bien été effectuée", "alert-success");
            header('Location: ' . URL . 'admin/rental/text_under_array_rentals');
            return;
        } else {
            Tools::showAlert("La modification n'a pas été effectuée", "alert-danger");
        }
    }
     // api
     public function  sendRentalsAndTextUnder()
     {
         $rentalsItems = $this->rentalManager->getRentals();
         $textUnderRentals = $this->rentalManager->getTextUnderArrayRentals();
         $rentals = [
             'rentalsItems' => $rentalsItems,
             'textUnderRentals' => $textUnderRentals
         ];
         Tools::sendJson_get($rentals);
     }
}
