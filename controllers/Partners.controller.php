<?php

require_once( './controllers/Main.controller.php' );
require_once( 'controllers/Tools.controller.php' );
require_once( 'controllers/Functions.controller.php' );
require_once( './models/Partners.model.php' );

class PartnersController extends MainController
 {
    private $functions;
    private $partnersManager;

    public function __construct()
 {
        $this->functions = new Functions();
        $this->partnersManager = new PartnersManager();
    }

    public function  partnersPage()
 {
        $allPartners = $this->partnersManager->getAllPartnersDB();

        $data_page = [
            'page_description' => 'Page des partenaires',
            'page_title' => 'VE | Partenaires',
            'view' => './views/pages/home/partners.view.php',
            'template' => './views/common/template.php',
            'allPartners' => $allPartners,
        ];
        $this->functions->generatePage( $data_page );
    }

    public function addPartner( $name, $link, $position, $logo )
 {
        // echo( $name. $link );
        // Tools::showArray( $logo );
        $addedLogo = Tools::addImage( $logo, 'public/assets/images/partners/' );
        if ( !$this->partnersManager->addPartnerDB( $name, $link, $position, $addedLogo ) ) {
            Tools::showAlert( "Erreur lors de l'ajout du partenaire", 'alert-danger' );
        } else {
            Tools::showAlert( 'Partenaire ajouté avec succès', 'alert-success' );
        }
        header( 'Location: ' . URL . 'admin/partners/partners_page' );
    }

    public function deletePartner( $id )
 {
        $logoToDelete = $this->partnersManager->getPartnerById( $id )[ 'logo' ];
        if ( !$this->partnersManager->deletePartnerDB( $id ) ) {
        } else {
            if (!Tools::deleteImage( $logoToDelete, 'public/assets/images/partners/' ) )
            {
                Tools::showAlert( 'Erreur lors de la suppression du partenaire', 'alert-danger' );
            }
            Tools::showAlert( 'Partenaire supprimé avec succès', 'alert-success' );
        }
        header( 'Location: ' . URL . 'admin/partners/partners_page' );
    }
}
