<?php

// afin de ne pas avoir un index.php à rallonge,
// ici, la partie location
// swith( $url[ 1 ] ) sera toujours opinions/

switch ( $url[ 2 ] ) {

    case 'opinions_page':
    $opinionsController->opinionsPage();
    break;

    case 'validated_opinions_page':
    $opinionsController->validatedOpinionsPage();
    break;

    case 'delete_opinion':
        // echo $_POST['id'];
    $opinionsController->deleteOpinion($_POST['id']);
    break;

    case'add_opinion':
        $id = $_POST['id'];
        $response = $_POST['response'];
        $opinionsController->addOpinion($id, $response);
        break;

    case 'update_opinion':
        $id = $_POST['id'];
        $response = $_POST['response'];
        $opinionsController->updateOpinion($id, $response);
        break;

}