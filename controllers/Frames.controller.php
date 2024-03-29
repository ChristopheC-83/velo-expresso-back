<?php

require_once( './controllers/Main.controller.php' );
require_once( 'controllers/Tools.controller.php' );
require_once( 'controllers/Functions.controller.php' );
require_once( './models/Frames.model.php' );

class FramesController extends MainController
 {

    private $functions;
    private $framesManager;

    public function __construct()
 {
        $this->functions = new Functions();
        $this->framesManager = new FramesManager();
    }

    public function  framesPage()
 {
        $frames = $this->framesManager->getAllFramesDB();

        $data_page = [
            'page_description' => 'Page des Cadres',
            'page_title' => 'VE | Cadres',
            'view' => './views/pages/home/frames.view.php',
            'template' => './views/common/template.php',
            'frames' => $frames,
        ];
        $this->functions->generatePage( $data_page );
    }

    public function addFrame( $position, $title,$text, $btnText, $btnLink, $image ) {

        if ( $addedImage = Tools::addImage( $image, 'public/assets/images/frames/' )){
            if (!$this->framesManager->addFrameDB( $position, $title, $text,$btnText, $btnLink, $addedImage) ) {
                if(Tools::deleteImageMute( $addedImage, 'public/assets/images/frames/' )){
                    Tools::showAlert( "Erreur lors de l'ajout du cadre", 'alert-danger' );
                }else{
                    Tools::showAlert( "Problème ? Réessayez ou appeler votre dministrateur !", 'alert-danger' );
                }
            } else {
                Tools::showAlert( 'Cadre ajouté avec succès', 'alert-success' );
            }
            header( 'Location: ' . URL . 'admin/frames/frames_page' );
        } else{
            Tools::showAlert( "Erreur lors de l'ajout du Cadre !", 'alert-danger' );
        }
    }

    public function deleteFrame($id){ 
        
        $frameToDelete = $this->framesManager->getFrameById( $id )[ 'image' ];
        if( !$this->framesManager->deleteframeDB( $id ) ){
            Tools::showAlert( 'Erreur lors de la suppression du frame', 'alert-danger' );
        } else {
            if ( !Tools::deleteImage( $frameToDelete, 'public/assets/images/frames/' ) ){
                Tools::showAlert( 'Erreur lors de la suppression du cadre', 'alert-danger' );
            }
            Tools::showAlert( 'Cadre supprimé avec succès', 'alert-success' );
        }
        header( 'Location: ' . URL . 'admin/frames/frames_page' );
    
    }


    public function  sendFrames() {

        $allFrames = $this->framesManager->getAllframesDB();
        $frames = [
            'allFrames'=>$allFrames
        ];
        Tools::sendJson_get( $frames );
    }


}