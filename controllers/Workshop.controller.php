<?php

require_once("./controllers/Main.controller.php");
require_once("controllers/Tools.controller.php");
require_once("controllers/Functions.controller.php");
require_once("./models/Workshop.model.php");

class WorkshopController extends MainController
{

    private $functions;
    private $workshopManager;
    public function __construct()
    {
        $this->functions = new Functions();
        $this->workshopManager = new WorkshopManager();
    }

    // les catégories
    public function  workshopPage()
    {
        $categories = $this->workshopManager->getCategories();

        $data_page = [
            "page_description" => "Page de l'atelier",
            "page_title" => "VE | Atelier",
            "view" => "./views/pages/workshop/categories.view.php",
            "template" => "./views/common/template.php",
            "categories" => $categories
        ];
        $this->functions->generatePage($data_page);
    }
    public function sendNewCategory($new_category, $new_position)
    {

        if (!$this->workshopManager->isCategoryNameFree($new_category)) {
            Tools::showAlert("La catégorie existe déjà", "alert-danger");
            header('Location: ' . URL . 'admin/workshop_page');
            Tools::showArray($new_category);
            return;
        }
        if (!$this->workshopManager->isPositionFree($new_position)) {
            Tools::showAlert("La position est déjà prise", "alert-danger");
            header('Location: ' . URL . 'admin/workshop_page');
            return;
        }
        if ($this->workshopManager->createNewCategory($new_category, $new_position)) {
            Tools::showAlert("La catégorie a bien été ajoutée", "alert-success");
        } else {
            Tools::showAlert("La catégorie n'a pas été ajoutée", "alert-danger");
        }
        header('Location: ' . URL . 'admin/workshop_page');
    }
    public function modifyCategory($id, $new_category, $new_position)
    {
        if (!$this->workshopManager->isPositionFree($new_position)) {
            Tools::showAlert("La position est déjà prise", "alert-danger");
            header('Location: ' . URL . 'admin/workshop_page');
            return;
        }
        if ($this->workshopManager->updateCategory($id, $new_category, $new_position)) {
            Tools::showAlert("La catégorie a bien été modifiée", "alert-success");
        } else {
            Tools::showAlert("La catégorie n'a pas été modifiée", "alert-danger");
        }
        header('Location: ' . URL . 'admin/workshop_page');
    }
    public function deleteCategory($cat_id)
    {
        if ($this->workshopManager->deleteCategoryFromDB($cat_id)) {
            Tools::showAlert("La catégorie a bien été supprimée", "alert-success");
        } else {
            Tools::showAlert("La catégorie n'a pas été supprimée", "alert-danger");
        }
        header('Location: ' . URL . 'admin/workshop_page');
    }

    // les taches
    public function tasksPage($cat_name)
    {
        $category = $this->workshopManager->getCategoryByName($cat_name);
        $tasks = $this->workshopManager->getTasksByCategory($cat_name);

        $data_page = [
            "page_description" => "Page de l'atelier",
            "page_title" => "VE | Atelier",
            "view" => "./views/pages/workshop/category.view.php",
            "template" => "./views/common/template.php",
            "category" => $category,
            "tasks" => $tasks,
        ];
        $this->functions->generatePage($data_page);
    }

    public function sendNewTask($task_category, $task_name, $task_position, $task_price)
    {
        if (!$this->workshopManager->isTaskByNameFree($task_name)) {
            Tools::showAlert("La tache existe déjà", "alert-danger");
            header('Location: ' . URL . 'admin/workshop/' . $task_category);
            return;
        }

        if ($this->workshopManager->createNewTask($task_category, $task_name, $task_position, $task_price)) {
            Tools::showAlert("La tâche a bien été ajoutée", "alert-success");
        } else {
            Tools::showAlert("La tâche n'a pas été ajoutée", "alert-danger");
        }
        header('Location: ' . URL . 'admin/workshop/' . $task_category);
    }
}
