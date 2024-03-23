
<?php

session_start();

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER["PHP_SELF"]));
define("IMG_PATH", URL . "public/assets/images/");
define("AVATARS_PATH", IMG_PATH . "avatars/");
define("MEDIA_PATH", "public/assets/articles_media/article_");


require_once("./controllers/Tools.controller.php");
require_once("./controllers/Main.controller.php");
require_once("./controllers/Home.controller.php");
require_once("./controllers/Bikes.controller.php");
require_once("./controllers/Rental.controller.php");
require_once("./controllers/Workshop.controller.php");

$mainController = new MainController();
$homeController = new HomeController();
$bikesController = new BikesController();
$workshopController = new WorkshopController();
$rentalController = new RentalController();

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

                            // Gestion page d'accueil
                        case "sliders_page":
                            $homeController->slidersPage();
                            break;
                        case "frames_page":
                            $homeController->framesPage();
                            break;
                        case "partners_page":
                            $homeController->partnersPage();
                            break;
                        case "opinions_page":
                            $homeController->opinionsPage();
                            break;

                            // Gestion page des vélos
                        case "features_page":
                            $bikesController->featuresPage();
                            break;

                        case "bikes_page":
                            $bikesController->bikesPage();
                            break;


                            // Gestion page de l'atelier
                        case "workshop_page":
                            $workshopController->workshopPage();
                            break;

                        case "send_new_category":
                            $new_position = Tools::secureHTML($_POST['new_position']);
                            $new_category = Tools::secureHTML($_POST['new_category']);
                            if (empty($new_position) || empty($new_category)) {
                                Tools::showAlert("Il faut remplir les 2 champs !", "alert-danger");
                                header('Location: ' . URL . 'admin/workshop_page');
                            } else {
                                $workshopController->sendNewCategory($new_category, $new_position);
                            }
                            break;

                        case "delete_category":
                            $workshopController->deleteCategory($_POST['id']);
                            break;



                            // Gestion page de la location 
                        case "rental_page":
                            $rentalController->rentalPage();
                            break;








                        default:
                            throw new Exception("La page demandée n'existe pas...");
                    }
                }
                break;


                // Les apis

                // case "api_characters_rpg":
                //     $charactersController->sendCharacters();
                //     break;
                // case "api_hangman_words":
                //     $hangmanController->sendHangmanWords();
                //     break;
                // case "api_blog_articles":
                //     $blogController->sendAllArticles();
                //     break;



            default:
                throw new Exception("La page demandée n'existe pas...");
        }
    }
} catch (Exception $msg) {
    $mainController->errorPage($msg->getMessage());
}
