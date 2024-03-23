
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


                            // Gestion des catégories de l'atelier
                        case "workshop_page":
                            $workshopController->workshopPage();
                            break;
                        case "send_new_category":
                            $new_position = Tools::secureHTML($_POST['new_position']);
                            $new_category = strtolower(Tools::secureHTML($_POST['new_category']));
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
                        case "modify_category":
                            $id = $_POST['id'];
                            $new_position = Tools::secureHTML($_POST['new_cat_position']);
                            $new_category = strtolower(Tools::secureHTML($_POST['new_cat_name']));
                            if (empty($new_position) || empty($new_category)) {
                                Tools::showAlert("Il faut remplir les 2 champs !", "alert-danger");
                                header('Location: ' . URL . 'admin/workshop_page');
                            } else {
                                $workshopController->modifyCategory($id, $new_category, $new_position);
                            }
                            break;

                            // gestion des taches de l'atelier
                        case "workshop":
                            $workshopController->tasksPage($url[2]);
                            break;

                        case "send_new_task":
                            $task_category = $_POST['task_category'];
                            $task_price = Tools::secureHTML($_POST['task_price']);
                            $task_position = Tools::secureHTML($_POST['task_position']);
                            $task_name = strtolower(Tools::secureHTML($_POST['task_name']));
                            if (empty($task_price) || empty($task_position) || empty($task_name)) {
                                Tools::showAlert("Il faut remplir les 3 champs !", "alert-danger");
                                header('Location: ' . URL . 'admin/workshop/' . $task_category);
                            } else {
                                $workshopController->sendNewTask($task_category, $task_name, $task_position, $task_price);
                            }
                            break;
                        case "delete_task":
                            $workshopController->deleteTask($_POST['id'], $_POST['task_category']);
                            break;
                        case "modify_task":
                            Tools::showArray($_POST);
                            $id = $_POST['id'];
                            $task_category = $_POST['task_category'];
                            $new_name = Tools::secureHTML($_POST['new_task_name']);
                            $new_position = Tools::secureHTML($_POST['new_task_position']);
                            $new_price = strtolower(Tools::secureHTML($_POST['new_task_price']));
                            if (empty($new_position) || empty($new_name) || empty($new_price)) {
                                Tools::showAlert("Il faut remplir les 3 champs !", "alert-danger");
                                header('Location: ' . URL . 'admin/workshop/'.$task_category);
                            } else {
                                $workshopController->modifyTask($id,$new_name, $new_position, $new_price);
                            }
                            break;

                            case "show_all_tasks":
                                $workshopController->showAllTasks();
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
