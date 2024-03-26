<?php

// afin de ne pas avoir un index.php à rallonge,
// ici, la partie location
// swith( $url[ 1 ] ) sera toujours bikes/

switch ( $url[ 2 ] ) {

    case 'bikes_page':
    $bikesController->bikesPage();
    break;

    case 'create_bike':
    $bikesController->createBikePage();
    break;
    case 'send_new_bike':
    $infos_new_bike = [
        'bike_visibility' => Tools::secureHTML( $_POST[ 'bike_visibility' ] ),
        'bike_brand' => Tools::secureHTML( $_POST[ 'bike_brand' ] ),
        'bike_model' => Tools::secureHTML( $_POST[ 'bike_model' ] ),
        'bike_new' => Tools::secureHTML( $_POST[ 'bike_new' ] ),
        'bike_type' => Tools::secureHTML( $_POST[ 'bike_type' ] ),
        'bike_size' => Tools::secureHTML( $_POST[ 'bike_size' ] ),
        'bike_suspension' => Tools::secureHTML( $_POST[ 'bike_suspension' ] ),
        'bike_speeds_number' => Tools::secureHTML( $_POST[ 'bike_speeds_number' ] ),
        'bike_transmission' => Tools::secureHTML( $_POST[ 'bike_transmission' ] ),
        'bike_wheels_dim' => Tools::secureHTML( $_POST[ 'bike_wheels_dim' ] ),
        'bike_wheels' => Tools::secureHTML( $_POST[ 'bike_wheels' ] ),
        'bike_brake' => Tools::secureHTML( $_POST[ 'bike_brake' ] ),
        'bike_elec'=> Tools::secureHTML( $_POST[ 'bike_elec' ] ),
        'bike_elec_detail' => Tools::secureHTML( $_POST[ 'bike_elec_detail' ] ),
        'bike_price' => Tools::secureHTML( $_POST[ 'bike_price' ] ),
        'bike_promo' => Tools::secureHTML( $_POST[ 'bike_promo' ] ),
        'bike_price_promo' => Tools::secureHTML( $_POST[ 'bike_price_promo' ] ),
        'bike_description' => Tools::secureHTML( $_POST[ 'bike_description' ] ),
        'bike_msg_perso' => Tools::secureHTML( $_POST[ 'bike_msg_perso' ] ),
        'bike_image_name' => $_FILES[ 'bike_picture' ][ 'name' ],
        'bike_image_tmp' => $_FILES[ 'bike_picture' ][ 'tmp_name' ],
        'bike_image_size' => $_FILES[ 'bike_picture' ][ 'size' ],
        "bike_picture" => ""
    ];
    if ( empty( $infos_new_bike[ 'bike_brand' ] )
        || empty( $infos_new_bike[ 'bike_model' ] )
        || empty( $infos_new_bike[ 'bike_new' ] )
        || empty( $infos_new_bike[ 'bike_price' ] )
        || empty( $infos_new_bike[ 'bike_image_name' ] )
        || empty( $infos_new_bike[ 'bike_image_tmp' ] )
        || empty( $infos_new_bike[ 'bike_image_size' ] ) ) {
            Tools::showAlert( 'Il manque des informations essentielles', 'alert-danger' );
            header( 'Location: ' . URL . 'admin/bikes/create_bike' );
    } else {
        $bikesController->sendNewBike( $infos_new_bike );
    }

    break;
    case 'delete_bike':

    // $featuresController->deleteFeature( $_POST[ 'id' ] );
    break;

}