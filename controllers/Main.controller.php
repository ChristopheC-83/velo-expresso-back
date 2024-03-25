<?php


require_once("./models/Main.model.php");
require_once("./controllers/Functions.controller.php");
class MainController
{
    private $functions;
    private $mainManager;
    public function __construct()
    {
        $this->functions = new Functions();
        $this->mainManager = new MainManager();
    }


    // les Vues
    public function homePage()
    {
        $data_page = [
            "page_description" => "Accueil de l'hebergeur",
            "page_title" => "Herbergeur | accueil",
            // "javascript" => ['xxx.js'],
            "view" => "views/pages/homePage.view.php",
            "template" => "./views/common/template.php"
        ];
        $this->functions->generatePage($data_page);
    }
   
    public function errorPage($msg)
    {
        $data_page = [
            "page_description" => "Accueil de l'hebergeur",
            "page_title" => "Herbergeur | accueil",
            "msg" => $msg,
            "view" => "views/pages/errorPage.view.php",
            "template" => "./views/common/template.php"
        ];
        $this->functions->generatePage($data_page);
    }


     // Les Utilitaires
     public function validation_login($user_name, $user_password)
     {
         $datasUser = $this->mainManager->getUserInfo($user_name);
         if ($this->mainManager->isCombinationValid($user_name, $user_password)) {
             Tools::showAlert("You're welcome !", "alert-success");
             $_SESSION['user_name'] = $user_name;
             $_SESSION['user_role'] =  $datasUser['user_role'];
             // Tools::generateCookieConnection();
             header('Location: ' . URL . 'home');
         } else {
             Tools::showAlert("Combinaison Mot de Passe / Pseudo invalide.", "alert-danger");
             header('Location: ' . URL . 'connection');
         }
     }
     public function logout()
     {
         $_SESSION['user_name'] = "";
         $_SESSION['user_role'] =  "";
         
         // setcookie(Tools::COOKIE_NAME, '', time() - 3600 * 24 * 365);
         if ($_SESSION['user_name']) {
             Tools::showAlert("La déconnexion a échoué.", "alert-danger");
         } else {
             Tools::showAlert("Vous êtes bien déconnecté(e).", "alert-success");
         }
         header('Location: ' . URL . 'home');
     }

    

}
