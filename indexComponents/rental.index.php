<?php 

// afin de ne pas avoir un index.php à rallonge, 
// ici, la partie location
// swith($url[1]) sera toujours rental/


switch($url[2]){
    case "add_rental_page":
        $rentalController->rentalPage();
        break;
    case "send_new_rental":
        Tools::showArray($_POST);
        Tools::showArray($_FILES);
        break;





        default:
        throw new Exception("La page demandée n'existe pas...");

}


