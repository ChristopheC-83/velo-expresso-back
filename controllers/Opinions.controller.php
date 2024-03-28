<?php

require_once( './controllers/Main.controller.php' );
require_once( 'controllers/Tools.controller.php' );
require_once( 'controllers/Functions.controller.php' );
require_once( './models/Opinions.model.php' );

class OpinionsController extends MainController
 {

    private $functions;
    private $OpinionsManager;

    public function __construct()
 {
        $this->functions = new Functions();
        $this->OpinionsManager = new OpinionsManager();
    }

    public function  opinionsPage()
 {
        $allOpinions = $this->OpinionsManager->getAllOpinionsNotValidated();
        $data_page = [
            'page_description' => 'Page des Avis utilisateurs',
            'page_title' => 'VE | Avis',
            'view' => './views/pages/opinions/opinionsPage.view.php',
            'template' => './views/common/template.php',
            'allOpinions' => $allOpinions,
        ];
        $this->functions->generatePage( $data_page );
    }
    public function  validatedOpinionsPage()
 {
        $allOpinions = $this->OpinionsManager->getAllOpinionsValidated();
        $data_page = [
            'page_description' => 'Page des Avis utilisateurs',
            'page_title' => 'VE | Avis',
            'view' => './views/pages/opinions/validatedOpinionsPage.view.php',
            'template' => './views/common/template.php',
            'allOpinions' => $allOpinions,
        ];
        $this->functions->generatePage( $data_page );
    }

    public function  deleteOpinion($id){


         if($this->OpinionsManager->deleteOpinionDB($id)){
            header('Location: ' . URL . 'admin/opinions/opinions_page');
            Tools::showAlert('Avis supprimé', 'alert-success');
        } else{
            header('Location: ' . URL . 'admin/opinions/opinions_page');
            Tools::showAlert('Erreur lors de la suppression', 'alert-danger');
        }
    
    }

    public function addOpinion($id, $response){ 
    
        if($this->OpinionsManager->addOpinionDB($id, $response)){
            header('Location: ' . URL . 'admin/opinions/opinions_page');
            Tools::showAlert('Avis validé', 'alert-success');
        } else{
            header('Location: ' . URL . 'admin/opinions/opinions_page');
            Tools::showAlert('Erreur lors de la validation', 'alert-danger');
        }
    
    }
    public function updateOpinion($id, $response){ 
    
        if($this->OpinionsManager->updateOpinionDB($id, $response)){
            header('Location: ' . URL . 'admin/opinions/validated_opinions_page');
            Tools::showAlert('Réponse modifiée', 'alert-success');
        } else{
            header('Location: ' . URL . 'admin/opinions/validated_opinions_page');
            Tools::showAlert('Erreur lors de la modification', 'alert-danger');
        }
    
    }

}