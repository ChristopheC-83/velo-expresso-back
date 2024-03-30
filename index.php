<?php

session_start();

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER["PHP_SELF"]));
define("IMG_PATH", URL . "public/assets/images/");
define("AVATARS_PATH", IMG_PATH . "avatars/");
define("MEDIA_PATH", "public/assets/articles_media/article_");


require_once("./controllers/Tools.controller.php");
require_once("./controllers/Main.controller.php");
require_once("./controllers/Home.controller.php");
require_once("./controllers/Partners.controller.php");
require_once("./controllers/Bikes.controller.php");
require_once("./controllers/FeaturesBikes.controller.php");
require_once("./controllers/Rental.controller.php");
require_once("./controllers/Workshop.controller.php");
require_once("./controllers/Opinions.controller.php");
require_once("./controllers/Slider.controller.php");
require_once("./controllers/Frames.controller.php");

$mainController = new MainController();
$homeController = new HomeController();
$partnersController = new PartnersController();
$bikesController = new BikesController();
$workshopController = new WorkshopController();
$rentalController = new RentalController();
$featuresController = new FeaturesController();
$opinionsController = new OpinionsController();
$sliderController = new SliderController();
$framesController = new FramesController();

try {
    if (!isset($_GET['page'])) {
        $mainController->homePage();
    } else {
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));   // on découpe l'url à chaque "/", on récupère les morceaux d'url pour nous diriger
        $page = $url[0];

        switch ($url[0]) {


            case "home":
                $mainController->homePage();
                break;

            case "validation_login":
                // Tools::showArray($_POST);
                if (!empty($_POST['user_name']) && !empty($_POST['user_password'])) {
                    $user_name = Tools::secureHTML($_POST['user_name']);
                    $user_password = Tools::secureHTML($_POST['user_password']);
                    $mainController->validation_login($user_name, $user_password);
                } else {
                    Tools::showAlert("Il faut remplir les 2 champs !", "alert-warning");
                    header('Location: ' . URL . 'connection');
                }
                break;

            case "admin":
                if (!Tools::isConnected()) {
                    Tools::showAlert("Vous devez vous connecter pour accéder à cet espace.", "alert-danger");
                    header('Location: ' . URL . 'connection');
                } else {
                    switch ($url[1]) {


                        case "logout":
                            $mainController->logout();
                            break;

                            // Gestion page de la location et des routes associées dans le fichier 
                        case "rental":
                            require_once("indexComponents/rental.index.php");
                            break;
                            // Gestion des partenaires
                        case "partners":
                            require_once("indexComponents/partners.index.php");
                            break;
                            // Gestion des caractéristiques communes des vélos
                        case "features":
                            require_once("indexComponents/featuresBikes.index.php");
                            break;
                            // Gestion des vélos
                        case "bikes":
                            require_once("indexComponents/bikes.index.php");
                            break;
                            // gestion des avis
                        case "opinions":
                            require_once("indexComponents/opinions.index.php");
                            break;
                            // gestion des slider de l'accueil
                        case "slider":
                            require_once("indexComponents/slider.index.php");
                            break;
                            // gestion des cadres de l'accueil
                        case "frames":
                            require_once("indexComponents/frames.index.php");
                            break;
                            // gestion des cadres de l'accueil
                        case "workshop":
                            require_once("indexComponents/workshop.index.php");
                            break;

                        default:
                            throw new Exception("La page demandée n'existe pas...");
                    }
                }
                break;


                // Les apis

            case "api_workshop":
                $workshopController->sendCategoriesAndTasksWorkshop();
                break;
            case "api_rentals":
                $rentalController->sendRentalsAndTextUnder();
                break;
            case "api_partners":
                $partnersController->sendPartners();
                break;
            case "api_bikes":
                $bikesController->sendBikes();
                break;
            case "api_opinions":
                $opinionsController->sendOpinions();
                break;
            case "api_slider":
                $sliderController->sendSliders();
                break;
            case "api_frames":
                $framesController->sendFrames();
                break;


            default:
                throw new Exception("La page demandée n'existe pas...");
        }
    }
} catch (Exception $msg) {
    $mainController->errorPage($msg->getMessage());
}