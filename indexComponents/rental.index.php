<?php 

// afin de ne pas avoir un index.php à rallonge, 
// ici, la partie location
// swith($url[1]) sera toujours rental/


switch($url[2]){
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
        Tools::showArray($_POST);
        break;





        default:
        throw new Exception("La page demandée n'existe pas...");

}


