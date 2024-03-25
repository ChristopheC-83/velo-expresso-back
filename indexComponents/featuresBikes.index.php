<?php

// afin de ne pas avoir un index.php à rallonge,
// ici, la partie location
// swith( $url[ 1 ] ) sera toujours features/

switch ( $url[ 2 ] ) {

    case 'features_page':
    $featuresController->featuresPage();
    break;

    case 'add_features':
    // Tools::showArray( $_POST );
    $feature = Tools::secureHTML( $_POST[ 'feature' ] );
    $position = Tools::secureHTML( $_POST[ 'position' ] );
    $data = Tools::secureHTML( $_POST[ 'data' ] );
    if ( empty( $feature ) || empty( $position ) || empty( $data ) || $feature === 'Caractéristique' ) {
        Tools::showAlert( 'Il faut remplir les 3 champs !', 'alert-danger' );
        header( 'Location: ' . URL . 'admin/features/features_page' );
    } else {
        $featuresController->sendNewFeatures( $feature, $position, $data );
    }
    break;

    case 'delete_feature':
    $featuresController->deleteFeature( $_POST[ 'id' ] );
    break;

}