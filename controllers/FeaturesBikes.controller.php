<?php

require_once( './controllers/Main.controller.php' );
require_once( 'controllers/Tools.controller.php' );
require_once( 'controllers/Functions.controller.php' );
require_once( './models/FeaturesBikes.model.php' );

class FeaturesController extends MainController
 {

    private $functions;
    private $featuresBikesManager;

    public function __construct()
 {
        $this->functions = new Functions();
        $this->featuresBikesManager = new FeaturesBikesManager();
    }

    public function  featuresPage()
 {
        $allFeatures = $this->featuresBikesManager->getAllFeatures();
        $allDatasFeatures = $this->featuresBikesManager->getAllDatasFeatures();
        $data_page = [
            'page_description' => 'Page des caractéristiques',
            'page_title' => 'VE | Caractéristiques',
            'view' => './views/pages/bikes/features.view.php',
            'template' => './views/common/template.php',
            'allFeatures' => $allFeatures,
            'allDatasFeatures' => $allDatasFeatures
        ];
        $this->functions->generatePage( $data_page );
    }

    public function sendNewFeatures( $feature, $position, $name )
 {
        if ( !$this->featuresBikesManager->isNameFree( $feature,$name, 'bike_data_features' ) ) {
            Tools::showAlert( 'La donnée existe déjà', 'alert-danger' );
            header( 'Location: ' . URL . 'admin/features/features_page' );
            return;
        }
        if ( !$this->featuresBikesManager->isPositionFree( $feature,$position, 'bike_data_features' ) ) {
            Tools::showAlert( 'La position est déjà prise', 'alert-danger' );
            header( 'Location: ' . URL . 'admin/features/features_page' );
            return;
        }

        if ( $this->featuresBikesManager->sendNewFeaturesDB( $feature, $position, $name ) ) {
            Tools::showAlert( 'Caractéristique ajoutée', 'alert-success' );
        } else {
            Tools::showAlert( "Erreur lors de l'ajout de la caractéristique", 'alert-danger' );
        }
        header( 'Location: ' . URL . 'admin/features/features_page' );
    }

    public function  deleteFeature( $id ) {
        if ( $this->featuresBikesManager->deleteFeatureDB( $id ) ) {
            Tools::showAlert( 'Caractéristique supprimée', 'alert-success' );
        } else {
            Tools::showAlert( 'Erreur lors de la suppression de la caractéristique', 'alert-danger' );
        }

        header( 'Location: ' . URL . 'admin/features/features_page' );
    }
}