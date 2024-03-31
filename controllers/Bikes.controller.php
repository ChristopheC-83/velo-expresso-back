<?php

require_once( './controllers/Main.controller.php' );
require_once( 'controllers/Tools.controller.php' );
require_once( 'controllers/Functions.controller.php' );
require_once( './models/Bikes.model.php' );
require_once( './models/FeaturesBikes.model.php' );

class BikesController extends MainController
 {

    private $functions;
    private $bikesManager;
    private $featuresBikesManager;

    public function __construct()
 {
        $this->functions = new Functions();
        $this->bikesManager = new BikesManager();
        $this->featuresBikesManager = new FeaturesBikesManager();
    }

    public function  bikesPage()
 {
        $allBikes = $this->bikesManager->getAllBikesDB();

        $data_page = [
            'page_description' => 'Page des vélos',
            'page_title' => 'VE | Vélos',
            'view' => './views/pages/bikes/bikes.view.php',
            'template' => './views/common/template.php',
            'allBikes' => $allBikes,
        ];
        $this->functions->generatePage( $data_page );
    }

    public function  newBikesPage()
 {
        $allBikes = $this->bikesManager->getAllBikesDB();

        $data_page = [
            'page_description' => 'Page des vélos',
            'page_title' => 'VE | Vélos',
            'view' => './views/pages/bikes/new_bikes.view.php',
            'template' => './views/common/template.php',
            'allBikes' => $allBikes,
        ];
        $this->functions->generatePage( $data_page );
    }

    public function  usedBikesPage()
 {
        $allBikes = $this->bikesManager->getAllBikesDB();

        $data_page = [
            'page_description' => 'Page des vélos',
            'page_title' => 'VE | Vélos',
            'view' => './views/pages/bikes/used_bikes.view.php',
            'template' => './views/common/template.php',
            'allBikes' => $allBikes,
        ];
        $this->functions->generatePage( $data_page );
    }

    public function createBikePage () {

        $allDatasFeatures = $this->featuresBikesManager->getAllDatasFeatures();
        $allFeatures = $this->featuresBikesManager->getAllFeatures();

        $data_page = [
            'page_description' => 'Page des vélos',
            'page_title' => "VE | Création d'un Vélo",
            'view' => './views/pages/bikes/createBike.view.php',
            'template' => './views/common/template.php',
            'allDatasFeatures' => $allDatasFeatures,
            'allFeatures' => $allFeatures,
        ];
        $this->functions->generatePage( $data_page );

    }

    public function oneBikePage( $bike_id ) {

        $bike = $this->bikesManager->getBikeById( $bike_id );
        $features = $this->featuresBikesManager->getAllDatasFeatures();
        $data_page = [
            'page_description' => 'Page des vélos',
            'page_title' => "VE | Création d'un Vélo",
            'view' => './views/pages/bikes/oneBikePage.view.php',
            'template' => './views/common/template.php',
            'bike' => $bike,
            'features' => $features,
        ];
        $this->functions->generatePage( $data_page );
    }

    public function sendNewBike( $infos_new_bike ) {

        $imgBike = [
            'tmp_name'=> $infos_new_bike[ 'bike_image_tmp' ],
            'name'=> $infos_new_bike[ 'bike_image_name' ],
            'size'=> $infos_new_bike[ 'bike_image_size' ]
        ];
        if ( !$infos_new_bike[ 'picture' ] = Tools::addImage( $imgBike, 'public/assets/images/bikes/' ) ) {
            Tools::showAlert( "L'image n'a pas pu être ajoutée", 'alert-danger' );
            header( 'Location: ' . URL . 'admin/bikes/create_bike' );
            return;
        }

        if ( !$this->bikesManager->createNewBikeDB( $infos_new_bike ) ) {
            Tools::deleteImage( $infos_new_bike[ 'picture' ], 'public/assets/images/bikes/' );
            Tools::showAlert( "Le vélo n'a pas pu être ajouté", 'alert-danger' );
            header( 'Location: ' . URL . 'admin/bikes/create_bike' );
            return;
        }

        Tools::showAlert( 'Le vélo a bien été ajouté', 'alert-success' );
        header( 'Location: ' . URL . 'admin/bikes/bikes_page' );
        return;

    }

    public function deleteBike( $id ) {
        $bike_to_delete = $this->bikesManager->getBikeById( $id );
        if ( !Tools::deleteImage( $bike_to_delete[ 'bike_picture' ], 'public/assets/images/bikes/' ) ) {
            Tools::showAlert( 'Pb supression image', 'alert-danger' );
            header( 'Location: ' . URL . 'admin/bikes/bikes_page' );
            return;
        }
        if ( $this->bikesManager->deleteBikeDB( $id ) ) {
            Tools::showAlert( 'Le vélo a bien été supprimé', 'alert-success' );
            header( 'Location: ' . URL . 'admin/bikes/bikes_page' );
        } else {
            Tools::showAlert( "Le vélo n'a pas pu être supprimé", 'alert-danger' );
            header( 'Location: ' . URL . 'admin/bikes/bikes_page' );
        }
    }

    public function  changePicture( $infos_new_picture ) {
        Tools::showArray( $infos_new_picture );
        echo $infos_new_picture[ 'bike_id' ];

        $bike_to_delete = $this->bikesManager->getBikeById( $infos_new_picture[ 'bike_id' ] );

        if ( $new_img = Tools::addImage( $infos_new_picture, 'public/assets/images/bikes/' ) ) {
            if ( Tools::deleteImage( $bike_to_delete[ 'bike_picture' ], 'public/assets/images/bikes/' ) ) {

                if ( $this->bikesManager->changePictureDB( $new_img, $infos_new_picture[ 'bike_id' ] ) ) {
                    Tools::showAlert( "L'image a bien été modifiée", 'alert-success' );
                    header( 'Location: ' . URL . 'admin/bikes/one_bike/' . $infos_new_picture[ 'bike_id' ] );
                } else {
                    Tools::showAlert( "L'image n'a pas pu être modifiée", 'alert-danger' );
                    header( 'Location: ' . URL . 'admin/bikes/one_bike/' . $infos_new_picture[ 'bike_id' ] );
                }
            } else {
                Tools::showAlert( "L'image n'a pas pu être supprimée", 'alert-danger' );
                header( 'Location: ' . URL . 'admin/bikes/one_bike/' . $infos_new_picture[ 'bike_id' ] );
            }
        } else {
            Tools::showAlert( "L'image n'a pas pu être ajoutée", 'alert-danger' );
            header( 'Location: ' . URL . 'admin/bikes/one_bike/' . $infos_new_picture[ 'bike_id' ] );
        }
    }

    public function updateBike( $bike_id, $to_update, $new_value ) {

        if ( $this->bikesManager->updateBikeDB( $bike_id, $to_update, $new_value ) ) {
            Tools::showAlert( 'Le vélo a bien été modifié', 'alert-success' );
            header( 'Location: ' . URL . 'admin/bikes/one_bike/' . $bike_id );
        } else {
            Tools::showAlert( "Le vélo n'a pas pu être modifié", 'alert-danger' );
            header( 'Location: ' . URL . 'admin/bikes/one_bike/' . $bike_id );
        }

    }

    public function updateBike2( $bikeDatas ) {
        if ( $this->bikesManager->updateBikeDB2( $bikeDatas ) ) {
            Tools::showAlert( 'Le vélo a bien été modifié', 'alert-success' );
            header( 'Location: ' . URL . 'admin/bikes/one_bike/' . $bikeDatas[ 'bike_id' ] );
        } else {
            Tools::showAlert( "Le vélo n'a pas pu être modifié", 'alert-danger' );
            header( 'Location: ' . URL . 'admin/bikes/one_bike/' . $bikeDatas[ 'bike_id' ] );
        }

    }

    public function  sendBikes() {

        $bikes = $this->bikesManager->getAllVisibleBikes();
        $bikes = [
            'bikes'=>$bikes
        ];
        Tools::sendJson_get( $bikes );
    }
}