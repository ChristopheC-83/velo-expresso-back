<?php

// afin de ne pas avoir un index.php à rallonge,
// ici, la partie location
// swith( $url[ 1 ] ) sera toujours bikes/

switch ( $url[ 2 ] ) {

    case "bikes_page":
        $bikesController->bikesPage();
        break;


    case 'create_bike':
        $bikesController->createBike();
        break;
    case 'delete_bike':
    // $featuresController->deleteFeature( $_POST[ 'id' ] );
    break;

}