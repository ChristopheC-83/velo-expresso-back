<?php

require_once( './controllers/Main.controller.php' );
require_once( 'controllers/Tools.controller.php' );
require_once( 'controllers/Functions.controller.php' );
require_once( './models/Slider.model.php' );

class SliderController extends MainController
 {

    private $functions;
    private $sliderManager;

    public function __construct()
 {
        $this->functions = new Functions();
        $this->sliderManager = new SliderManager();
    }

    public function  slidersPage()
 {
        $sliders = $this->sliderManager->getAllSlidersDB();

        $data_page = [
            'page_description' => 'Page des Sliders',
            'page_title' => 'VE | Sliders',
            'view' => './views/pages/home/sliders.view.php',
            'template' => './views/common/template.php',
            'sliders' => $sliders,
        ];
        $this->functions->generatePage( $data_page );
    }

    public function addSlider( $position, $title, $btnText, $btnLink, $image ) {

        if ( $addedImage = Tools::addImage( $image, 'public/assets/images/slider/' )){
            if (!$this->sliderManager->addSliderDB( $position, $title, $btnText, $btnLink, $addedImage ) ) {
                if(Tools::deleteImageMute( $addedImage, 'public/assets/images/slider/' )){
                    Tools::showAlert( "Erreur lors de l'ajout du slider", 'alert-danger' );
                }else{
                    Tools::showAlert( "Problème ? Réessayez ou appeler votre dministrateur !", 'alert-danger' );
                }
            } else {
                Tools::showAlert( 'Slider ajouté avec succès', 'alert-success' );
            }
            header( 'Location: ' . URL . 'admin/slider/sliders_page' );
        } else{
            Tools::showAlert( "Erreur lors de l'ajout du slider !", 'alert-danger' );
        }
    }

    public function deleteSlider($id){ 
        
        $sliderToDelete = $this->sliderManager->getSliderById( $id )[ 'image' ];
        if( !$this->sliderManager->deleteSliderDB( $id ) ){
            Tools::showAlert( 'Erreur lors de la suppression du slider', 'alert-danger' );
        } else {
            if ( !Tools::deleteImage( $sliderToDelete, 'public/assets/images/slider/' ) ){
                Tools::showAlert( 'Erreur lors de la suppression du slider', 'alert-danger' );
            }
            Tools::showAlert( 'Slider supprimé avec succès', 'alert-success' );
        }
        header( 'Location: ' . URL . 'admin/slider/sliders_page' );
    
    }

    public function overlaySlider ($id, $overlay){
        Tools::showArray($overlay);
        if ($this->sliderManager->updateOverlay($id, $overlay)){
            Tools::showAlert( 'Overlay Mis A Jour', 'alert-success' );
        } else {
            Tools::showAlert( 'Overlay inchangé', 'alert-warning' );
        }
        
        header( 'Location: ' . URL . 'admin/slider/sliders_page' );
    }

}