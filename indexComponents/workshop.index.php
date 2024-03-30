<?php

// afin de ne pas avoir un index.php à rallonge,
// ici, la partie atelier
// swith( $url[ 1 ] ) sera toujours admin/workshop/

switch ( $url[ 2 ] ) {

             case "workshop_page":
                $workshopController->workshopPage();
                break;
            case "send_new_category":
                $position = Tools::secureHTML($_POST['new_position']);
                $name = strtolower(Tools::secureHTML($_POST['new_category']));
                if (empty($name) || empty($position)) {
                    Tools::showAlert("Il faut remplir les 2 champs !", "alert-danger");
                    header('Location: ' . URL . 'admin/workshop/workshop_page');
                } else {
                    $workshopController->sendNewCategory($name, $position);
                }
                break;
            case "delete_category":
                $workshopController->deleteCategory($_POST['id']);
                break;
            case "modify_category":
                $id = $_POST['id'];
                $position = Tools::secureHTML($_POST['position']);
                $name = strtolower(Tools::secureHTML($_POST['name']));
                if (empty($position) || empty($name)) {
                    Tools::showAlert("Il faut remplir les 2 champs !", "alert-danger");
                    header('Location: ' . URL . 'admin/workshop/workshop_page');
                } else {
                    $workshopController->modifyCategory($id, $name, $position);
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
                    header('Location: ' . URL . 'admin/workshop/' . $task_category);
                } else {
                    $workshopController->modifyTask($id, $new_name, $new_position, $new_price);
                }
                break;

            case "show_all_tasks":
                $workshopController->showAllTasks();
                break;




















    }