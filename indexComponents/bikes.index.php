<?php

// afin de ne pas avoir un index.php à rallonge,
// ici, la partie location
// swith( $url[ 1 ] ) sera toujours admin/bikes/

switch ($url[2]) {

    case 'bikes_page':
        $bikesController->bikesPage();
        break;
    case 'new_bikes_page':
        $bikesController->newBikesPage();
        break;
    case 'used_bikes_page':
        $bikesController->usedBikesPage();
        break;

    case 'create_bike':
        $bikesController->createBikePage();
        break;

    case 'send_new_bike':
        $infos_new_bike = [
            'bike_visibility' => Tools::secureHTML($_POST['bike_visibility']),
            'bike_brand' => Tools::secureHTML($_POST['bike_brand']),
            'bike_model' => Tools::secureHTML($_POST['bike_model']),
            'bike_new' => Tools::secureHTML($_POST['bike_new']),
            'bike_type' => Tools::secureHTML($_POST['bike_type']),
            'bike_size' => Tools::secureHTML($_POST['bike_size']),
            'bike_suspension' => Tools::secureHTML($_POST['bike_suspension']),
            'bike_speeds_number' => Tools::secureHTML($_POST['bike_speeds_number']),
            'bike_transmission' => Tools::secureHTML($_POST['bike_transmission']),
            'bike_wheels_dim' => Tools::secureHTML($_POST['bike_wheels_dim']),
            'bike_wheels' => Tools::secureHTML($_POST['bike_wheels']),
            'bike_brake' => Tools::secureHTML($_POST['bike_brake']),
            'bike_elec' => Tools::secureHTML($_POST['bike_elec']),
            'bike_elec_detail' => Tools::secureHTML($_POST['bike_elec_detail']),
            'bike_price' => Tools::secureHTML($_POST['bike_price']),
            'bike_promo' => Tools::secureHTML($_POST['bike_promo']),
            'bike_price_promo' => Tools::secureHTML($_POST['bike_price_promo']),
            'bike_description' => Tools::secureHTML($_POST['bike_description']),
            'bike_msg_perso' => Tools::secureHTML($_POST['bike_msg_perso']),
            'bike_image_name' => str_replace(' ', '_', $_FILES['bike_picture']['name']),
            'bike_image_tmp' => $_FILES['bike_picture']['tmp_name'],
            'bike_image_size' => $_FILES['bike_picture']['size'],
            "bike_picture" => ""
        ];
        if (
            empty($infos_new_bike['bike_brand'])
            || empty($infos_new_bike['bike_model'])
            || empty($infos_new_bike['bike_new'])
            || empty($infos_new_bike['bike_price'])
            || empty($infos_new_bike['bike_image_name'])
            || empty($infos_new_bike['bike_image_tmp'])
            || empty($infos_new_bike['bike_image_size'])
        ) {
            // Tools::showAlert('Il manque des informations essentielles', 'alert-danger');
            Tools::showArray($_POST);
            Tools::showArray($_FILES);
            // header( 'Location: ' . URL . 'admin/bikes/create_bike' );
        } else {
            $bikesController->sendNewBike($infos_new_bike);
        }
        break;

    case 'delete_bike':
        $id_to_delete = Tools::secureHTML($_POST['id_to_delete']);
        $bikesController->deleteBike($id_to_delete);
        break;

    case 'one_bike':
        $bike_id = Tools::secureHTML($url[3]);
        $bikesController->oneBikePage($bike_id);
        break;

    // Modification d'un vélo

    case 'change_picture':
        $infos_new_picture = [
            'bike_id' => Tools::secureHTML($_POST['bike_id']),
            'name' => str_replace(' ', '_', $_FILES['new_picture']['name']),
            'tmp_name' => $_FILES['new_picture']['tmp_name'],
            'size' => $_FILES['new_picture']['size'],
        ];

        // Tools::showArray( $infos_new_picture );
        if (
            empty($infos_new_picture['name'])
            || empty($infos_new_picture['tmp_name'])
            || empty($infos_new_picture['size'])
        ) {
            Tools::showAlert('Il manque des informations essentielles !!!', 'alert-danger');
            header('Location: ' . URL . 'admin/bikes/one_bike/' . $infos_new_picture['bike_id']);
        } else {
            $bikesController->changePicture($infos_new_picture);
        }
        break;


    case "update_bike2":
        $bikeDatas = [
            "bike_id" => Tools::secureHTML($_POST["bike_id"]),
            "bike_visibility" => Tools::secureHTML($_POST["bike_visibility"]),
            "bike_sold" => Tools::secureHTML($_POST["bike_sold"]),
            "bike_brand" => Tools::secureHTML($_POST["bike_brand"]),
            "bike_model" => Tools::secureHTML($_POST["bike_model"]),
            "bike_new" => Tools::secureHTML($_POST["bike_new"]),
            "bike_type" => Tools::secureHTML($_POST["bike_type"]),
            "bike_size" => Tools::secureHTML($_POST["bike_size"]),
            "bike_suspension" => Tools::secureHTML($_POST["bike_suspension"]),
            "bike_speeds_number" => Tools::secureHTML($_POST["bike_speeds_number"]),
            "bike_transmission" => Tools::secureHTML($_POST["bike_transmission"]),
            "bike_wheels_dim" => Tools::secureHTML($_POST["bike_wheels_dim"]),
            "bike_wheels" => Tools::secureHTML($_POST["bike_wheels"]),
            "bike_brake" => Tools::secureHTML($_POST["bike_brake"]),
            "bike_elec" => Tools::secureHTML($_POST["bike_elec"]),
            "bike_elec_detail" => Tools::secureHTML($_POST["bike_elec_detail"]),
            "bike_price" => Tools::secureHTML($_POST["bike_price"]),
            "bike_promo" => Tools::secureHTML($_POST["bike_promo"]),
            "bike_price_promo" => Tools::secureHTML($_POST["bike_price_promo"]),
            "bike_picture" => Tools::secureHTML($_POST["bike_picture"]),
            "bike_description" => Tools::secureHTML($_POST["bike_description"]),
            "bike_msg_perso" => Tools::secureHTML($_POST["bike_msg_perso"]),
        ];
        if (
            empty($bikeDatas['bike_brand'])
            || empty($bikeDatas['bike_model'])
            || empty($bikeDatas['bike_new'])
            || empty($bikeDatas['bike_price'])
        ) {
            Tools::showAlert('Il manque des informations essentielles...', 'alert-danger');
            header('Location: ' . URL . 'admin/bikes/one_bike/' . $bikeDatas['bike_id']);
        } else {
            $bikesController->updateBike2($bikeDatas);
        }
        break;


    // case utilisé pour la page oneBikePage copy en en réserve
    case 'update_bike':
        $bike_id = Tools::secureHTML($_POST['bike_id']);
        $to_update = Tools::secureHTML($_POST['to_update']);
        $new_value = Tools::secureHTML($_POST['new_value']);
        echo $new_value;
        if (empty($new_value) && $new_value != 0) {
            Tools::showAlert('Il manque des informations à transmettre !', 'alert-danger');
            header('Location: ' . URL . 'admin/bikes/one_bike/' . $bike_id);
        } else {
            $bikesController->updateBike($bike_id, $to_update, $new_value);
        }


        break;

}