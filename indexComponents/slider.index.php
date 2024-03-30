<?php

// afin de ne pas avoir un index.php à rallonge,
// ici, la partie location
// swith( $url[ 1 ] ) sera toujours admin/slider/

switch ( $url[ 2 ] ) {

    case 'sliders_page':
    $sliderController->slidersPage();
    break;

    case 'add_slider':
    // Tools::showArray( $_POST );
    // Tools::showArray( $_FILES );
    $position = Tools::secureHTML( $_POST[ 'position' ] );
    $title = Tools::secureHTML( $_POST[ 'title' ] );
    $btnText = Tools::secureHTML( $_POST[ 'btnText' ] );
    $btnLink = Tools::secureHTML( $_POST[ 'btnLink' ] );
    $image = $_FILES[ 'image' ];
    if ( empty( $image ) ) {
        Tools::showAlert( 'Il faut au moins une image', 'alert-danger' );
        header( 'Location: ' . URL . 'admin/slider/slider_page' );
    } else {
        $sliderController->addSlider( $position, $title, $btnText, $btnLink, $image );
    }
    break;

    case 'delete_slider':
    $sliderController->deleteSlider( $_POST[ 'id' ] );
    break;

    case 'overlay_slider':
    $slider_id = Tools::secureHTML( $_POST[ 'slider_id' ] );
    $overlay = Tools::secureHTML( $_POST[ 'overlay' ] );
    $sliderController->overlaySlider( $slider_id, $overlay );

    break;

    default:
    throw new Exception( "La page demandée n'existe pas..." );
}