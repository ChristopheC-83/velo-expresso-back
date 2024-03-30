<?php

// afin de ne pas avoir un index.php à rallonge, 
// ici, la partie location
// swith($url[1]) sera toujours rental/


switch ($url[2]) {
    case "rentals_page":
        $rentalController->rentalsPage();
        break;
    case "text_under_array_rentals":
        $rentalController->textUnderArrayRentals();
        break;
    case "send_text_under_rental":
        $text = Tools::secureHTML($_POST['text_under_rental']);
        if(empty($text)){
            Tools::showAlert("Il faut impérativement du texte !", "alert-warning");
            header('Location: ' . URL . 'admin/rental/text_under_array_rentals');
        }
        $rentalController->sendTextUnderRental($text);
        break;
    case "send_new_rental":
        // Tools::showArray($_POST);
        $name = Tools::secureHTML($_POST['name']);
        $position = Tools::secureHTML($_POST['position']);
        $half_day = Tools::secureHTML($_POST['half-day']);
        $day = Tools::secureHTML($_POST['day']);
        $extra_day = Tools::secureHTML($_POST['extra-day']);
        $week = Tools::secureHTML($_POST['week']);
        if (empty($name) || empty($position) || empty($half_day) || empty($day) || empty($extra_day) || empty($week)) {
            Tools::showAlert("Il faut remplir tous les champs", "alert-danger");
            header('Location: ' . URL . 'admin/rental/add_rental_page');
        } else {
            $rentalController->sendNewRental($name, $position, $half_day, $day, $extra_day, $week);
        }
        break;

    case "modify_rental":
        $rentalController->modifyRental($url[3]);
        break;

    case "send_update_rental":
        // Tools::showArray($_POST);
        $id = Tools::secureHTML($_POST['id']);
        $name = Tools::secureHTML($_POST['name']);
        $position = Tools::secureHTML($_POST['position']);
        $half_day = Tools::secureHTML($_POST['half_day']);
        $day = Tools::secureHTML($_POST['day']);
        $extra_day = Tools::secureHTML($_POST['extra_day']);
        $week = Tools::secureHTML($_POST['week']);
        if (empty($name) || empty($position) || empty($half_day) || empty($day) || empty($extra_day) || empty($week)) {
            Tools::showAlert("Il faut remplir tous les champs", "alert-danger");
            header('Location: ' . URL . 'admin/rental/modify_rental/'.$id);
        } else {
            $rentalController->updateRental($id, $name, $position, $half_day, $day, $extra_day, $week);
        }
        break;


    case "delete_rental":
        $rentalController->deleteRental($_POST['id']);
        break;





    default:
        throw new Exception("La page demandée n'existe pas...");
}
