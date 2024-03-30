<?php

// afin de ne pas avoir un index.php à rallonge,
// ici, la partie location
// swith( $url[ 1 ] ) sera toujours partners/

switch ( $url[ 2 ] ) {

    case 'partners_page':
    $partnersController->partnersPage();
    break;

    case 'add_partner':
    $name = Tools::secureHTML( $_POST[ 'name' ] );
    $link = Tools::secureHTML( $_POST[ 'link' ] );
    $position = Tools::secureHTML( $_POST[ 'position' ] );
    $logo = $_FILES[ 'logo' ];
    if ( empty( $name ) || empty( $link ) || empty( $position )  || empty( $logo ) ) {
        Tools::showAlert( 'Il faut remplir tous les champs', 'alert-danger' );
        header( 'Location: ' . URL . 'admin/partners/partners_page' );
    } else {
        $partnersController->addPartner( $name, $link, $position, $logo );
    }
    break;
    case 'update_partner':
    $id = Tools::secureHTML( $_POST[ 'id' ] );
    $name = Tools::secureHTML( $_POST[ 'name' ] );
    $link = Tools::secureHTML( $_POST[ 'link' ] );
    $position = Tools::secureHTML( $_POST[ 'position' ] );
    if ( empty( $name ) || empty( $link ) || empty( $position ) ) {
        Tools::showAlert( 'Il faut remplir tous les champs', 'alert-danger' );
        header( 'Location: ' . URL . 'admin/partners/partners_page' );
    } else {
        $partnersController->updatePartner( $id, $name, $link, $position );
    }
    break;

    case 'delete_partner':
    $partnersController->deletePartner( $_POST[ 'id' ] );
    break;

    default:
    throw new Exception( "La page demandée n'existe pas..." );
}