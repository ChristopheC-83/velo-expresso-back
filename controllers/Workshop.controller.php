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
        
        if (!$this->workshopManager->isNameFreeGeneric($new_category, "workshop_categories")) {
            Tools::showAlert("La catégorie existe déjà", "alert-danger");
            header('Location: ' . URL . 'admin/workshop/workshop_page');
            Tools::showArray($new_category);
            return;
        }
        if (!$this->workshopManager->isPositionFreeGeneric($new_position,"workshop_categories")) {
            Tools::showAlert("La position est déjà prise", "alert-danger");
            header('Location: ' . URL . 'admin/workshop/workshop_page');
            return;
        }
        if ($this->workshopManager->createNewCategory($new_category, $new_position)) {
            Tools::showAlert("La catégorie a bien été ajoutée", "alert-success");
        } else {
            Tools::showAlert("La catégorie n'a pas été ajoutée", "alert-danger");
        }
        header('Location: ' . URL . 'admin/workshop/workshop_page');
    }
    public function modifyCategory($id, $name, $position)
    {
        $old_position = $this->workshopManager->getCategoryById($id)['position'];
        $old_name = $this->workshopManager->getCategoryById($id)['name'];

        if (!$this->workshopManager->isNameFreeGeneric($name, "workshop_categories") && $name != $old_name) {
            Tools::showAlert("Ce nom est déjà pris, Merci d'en changer.", "alert-warning");
            header('Location: ' . URL . 'admin/workshop/workshop_page');
            return;
        }
        if (!$this->workshopManager->isPositionFreeGeneric($position, "workshop_categories") && $position != $old_position) {
            Tools::showAlert("Cette position est déjà prise, Merci d'en changer.", "alert-warning");
            header('Location: ' . URL . 'admin/workshop/workshop_page');
            return;
        }

        if ($this->workshopManager->updateCategory($id, $name, $position)) {
            Tools::showAlert("La catégorie a bien été modifiée", "alert-success");
        } else {
            Tools::showAlert("La catégorie n'a pas été modifiée", "alert-warning");
        }

        header('Location: ' . URL . 'admin/workshop/workshop_page');
    }
    public function deleteCategory($cat_id)
    {
        if ($this->workshopManager->deleteCategoryFromDB($cat_id)) {
            Tools::showAlert("La catégorie a bien été supprimée", "alert-success");
        } else {
            Tools::showAlert("La catégorie n'a pas été supprimée", "alert-danger");
        }
        header('Location: ' . URL . 'admin/workshop/workshop_page');
    }


    // les taches
    public function tasksPage($name)
    {
        $category = $this->workshopManager->getCategoryByName($name);
        $tasks = $this->workshopManager->getTasksByCategory($name);

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
    public function sendNewTask($task_category, $name, $position, $price)
    {

        if (!$this->workshopManager->isNameFreeGeneric($name, "workshop")) {
            Tools::showAlert("Ce nom est déjà pris, Merci d'en changer.", "alert-warning");
            header('Location: ' . URL . 'admin/workshop/workshop/'.$task_category);
            return;
        }
        if (!$this->workshopManager->isPositionFreeGeneric($position, "workshop")) {
            Tools::showAlert("Cette position est déjà prise, Merci d'en changer.", "alert-warning");
            header('Location: ' . URL . 'admin/workshop/workshop/'.$task_category);
            return;
        }

        if ($this->workshopManager->createNewTask($task_category, $name, $position, $price)) {
            Tools::showAlert("La tâche a bien été ajoutée", "alert-success");
        } else {
            Tools::showAlert("La tâche n'a pas été ajoutée", "alert-danger");
        }
        header('Location: ' . URL . 'admin/workshop/workshop/' . $task_category);
    }
    public function deleteTask($id, $task_category)
    {
        if ($this->workshopManager->deleteTaskFromDB($id)) {
            Tools::showAlert("La tache a bien été supprimée", "alert-success");
        } else {
            Tools::showAlert("La tache n'a pas été supprimée", "alert-danger");
        }
        header('Location: ' . URL . 'admin/workshop/workshop/' . $task_category);
    }

    public function  modifyTask($id, $new_name, $new_position, $new_price)
    {
        $old_position = $this->workshopManager->getTaskById($id)['position'];
        $task_category = $this->workshopManager->getTaskById($id)['task_category'];
        $old_name = $this->workshopManager->getTaskById($id)['name'];


        if (!$this->workshopManager->isNameFreeGeneric($new_name, "workshop") && $new_name != $old_name) {
            Tools::showAlert("Ce nom est déjà pris, Merci d'en changer.", "alert-warning");
            header('Location: ' . URL . 'admin/workshop/workshop/' . $task_category);
            return;
        }
        if (!$this->workshopManager->isPositionFreeGeneric($new_position, "workshop") && $new_position != $old_position) {
            Tools::showAlert("Cette position est déjà prise, Merci d'en changer.", "alert-warning");
            header('Location: ' . URL . 'admin/workshop/workshop/' . $task_category);
            return;
        }

        if ($this->workshopManager->updateTask($id, $new_name, $new_position, $new_price)) {
            Tools::showAlert("La tache a bien été modifiée", "alert-success");
        } else {
            Tools::showAlert("La tache n'a pas été modifiée", "alert-warning");
        }

        header('Location: ' . URL . 'admin/workshop/workshop/' . $task_category);
    }
    public function  showAllTasks()
    {
        $categories = $this->workshopManager->getCategories();
        $tasks = $this->workshopManager->getAllTasks();

        $data_page = [
            "page_description" => "Page de l'atelier",
            "page_title" => "VE | Atelier",
            "view" => "./views/pages/workshop/showAllTasks.view.php",
            "template" => "./views/common/template.php",
            "categories" => $categories,
            "tasks" => $tasks,
        ];

        $this->functions->generatePage($data_page);
    }

    // api
    public function  sendCategoriesAndTasksWorkshop()
    {
        $categoriesWorkshop = $this->workshopManager->getCategories();
        $tasksWorkshop = $this->workshopManager->getAllTasks();
        $workshop = [
            'categoriesWorkshop' => $categoriesWorkshop,
            'tasksWorkshop' => $tasksWorkshop
        ];
        Tools::sendJson_get($workshop);
    }
}