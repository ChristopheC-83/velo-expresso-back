<?php

// afin de ne pas avoir un index.php à rallonge,
// ici, la partie location
// swith( $url[ 1 ] ) sera toujours admin/frames/

switch ( $url[ 2 ] ) {

    case 'frames_page':
    $framesController->framesPage();
    break;

    case 'add_frame':
    // Tools::showArray( $_POST );
    // Tools::showArray( $_FILES );
    $position = Tools::secureHTML( $_POST[ 'position' ] );
    $title = Tools::secureHTML( $_POST[ 'title' ] );
    $text = Tools::secureHTML( $_POST[ 'text' ] );
    $btnText = Tools::secureHTML( $_POST[ 'btnText' ] );
    $btnLink = Tools::secureHTML( $_POST[ 'btnLink' ] );
    $image = $_FILES[ 'image' ];
    if ( empty( $image ) || empty( $title ) || empty( $btnText ) || empty( $btnLink )){
        Tools::showAlert( 'Il faut au moins une image', 'alert-danger' );
        header( 'Location: ' . URL . 'admin/frames/frame_page' );
    } else {
        $framesController->addframe( $position, $title,$text, $btnText, $btnLink, $image );
    }
    break;

    case 'delete_frame':
    $framesController->deleteframe( $_POST[ 'id' ] );
    break;

    
}