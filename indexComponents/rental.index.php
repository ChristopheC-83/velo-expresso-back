<?php

// afin de ne pas avoir un index.php à rallonge, 
// ici, la partie location
// swith($url[1]) sera toujours rental/


switch ($url[2]) {
    case "rentals_page":
        $rentalController->rentalsPage();
        break;
    case "text_under_arry_rentals":
        $rentalController->textUnderArrayRentals();
        break;
    case "add_rental_page":
        $rentalController->addRental();
        break;
    case "send_new_rental":
        // Tools::showArray($_POST);
        $item = Tools::secureHTML($_POST['item']);
        $position = Tools::secureHTML($_POST['position']);
        $half_day = Tools::secureHTML($_POST['half-day']);
        $day = Tools::secureHTML($_POST['day']);
        $extra_day = Tools::secureHTML($_POST['extra-day']);
        $week = Tools::secureHTML($_POST['week']);
        if (empty($item) || empty($position) || empty($half_day) || empty($day) || empty($extra_day) || empty($week)) {
            Tools::showAlert("Il faut remplir tous les champs", "alert-danger");
            header('Location: ' . URL . 'admin/rental/add_rental_page');
        } else {
            $rentalController->sendNewRental($item, $position, $half_day, $day, $extra_day, $week);
        }
        break;

    case "modify_rental":
        $rentalController->modifyRental($url[3]);
        break;

    case "send_update_rental":
        // Tools::showArray($_POST);
        $id = Tools::secureHTML($_POST['id']);
        $item = Tools::secureHTML($_POST['item']);
        $position = Tools::secureHTML($_POST['position']);
        $half_day = Tools::secureHTML($_POST['half_day']);
        $day = Tools::secureHTML($_POST['day']);
        $extra_day = Tools::secureHTML($_POST['extra_day']);
        $week = Tools::secureHTML($_POST['week']);
        if (empty($item) || empty($position) || empty($half_day) || empty($day) || empty($extra_day) || empty($week)) {
            Tools::showAlert("Il faut remplir tous les champs", "alert-danger");
            header('Location: ' . URL . 'admin/rental/modify_rental/'.$id);
        } else {
            $rentalController->updateRental($id, $item, $position, $half_day, $day, $extra_day, $week);
        }
        break;


    case "delete_rental":
        $rentalController->deleteRental($_POST['id']);
        break;





    default:
        throw new Exception("La page demandée n'existe pas...");
}
