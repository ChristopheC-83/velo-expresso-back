<?php

require_once("./models/Main.model.php");

class WorkshopManager extends MainManager
{

    // Les catégories
    public function getCategories()
    {
        $req = "SELECT * FROM workshop_categories ORDER BY cat_position";
        $stmt = $this->getDB()->prepare($req);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $categories;
    }
    public function getCategoryById($task_category_id)
    {
        $req = "SELECT * FROM workshop_categories WHERE cat_id = :task_category_id";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":task_category_id", $task_category_id, PDO::PARAM_INT);
        $stmt->execute();
        $category = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $category;
    }
    public function getCategoryByPosition($cat_position)
    {
        $req = "SELECT * FROM workshop_categories WHERE cat_position = :cat_position";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":cat_position", $cat_position, PDO::PARAM_INT);
        $stmt->execute();
        $category = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $category;
    }
    public function isPositionFree($cat_position)
    {
        return (empty($this->getCategoryByPosition($cat_position)));
    }
    public function getCategoryByName($cat_name)
    {
        $req = "SELECT * FROM workshop_categories WHERE cat_name = :cat_name";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":cat_name", $cat_name, PDO::PARAM_STR);
        $stmt->execute();
        $category = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $category;
    }
    public function isCategoryNameFree($cat_name)
    {
        return (empty($this->getCategoryByName($cat_name)));
    }
    public function createNewCategory($cat_name, $cat_position)
    {
        $req = "INSERT INTO workshop_categories (cat_name, cat_position) VALUES (:cat_name, :cat_position)";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":cat_name", $cat_name, PDO::PARAM_STR);
        $stmt->bindValue(":cat_position", $cat_position, PDO::PARAM_STR);
        $stmt->execute();
        $isValidate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isValidate;
    }
    public function updateCategory($cat_id, $cat_name, $cat_position)
    {
        $req = "UPDATE workshop_categories SET cat_name = :cat_name, cat_position = :cat_position WHERE cat_id = :cat_id";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":cat_name", $cat_name, PDO::PARAM_STR);
        $stmt->bindValue(":cat_position", $cat_position, PDO::PARAM_INT);
        $stmt->bindValue(":cat_id", $cat_id, PDO::PARAM_INT);
        $stmt->execute();
        $isValidate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isValidate;
    }
    public function deleteCategoryFromDB($cat_id)
    {
        $req = "DELETE FROM workshop_categories WHERE cat_id = :cat_id";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":cat_id", $cat_id, PDO::PARAM_INT);
        $stmt->execute();
        $isValidate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isValidate;
    }


    //  les taches

    public function createNewTask($task_category, $task_name, $task_position, $task_price)
    {

        $req = "INSERT INTO workshop (task_category, task_name,task_position, task_price) VALUES (:task_category,:task_name, :task_position, :task_price)";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":task_category", $task_category, PDO::PARAM_STR);
        $stmt->bindValue(":task_name", $task_name, PDO::PARAM_STR);
        $stmt->bindValue(":task_position", $task_position, PDO::PARAM_INT);
        $stmt->bindValue(":task_price", $task_price, PDO::PARAM_INT);
        $stmt->execute();
        $isValidate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isValidate;
    }

    public function  getTasksByCategory($task_category)
    {
        $req = "SELECT * FROM workshop WHERE task_category = :task_category";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":task_category", $task_category, PDO::PARAM_STR);
        $stmt->execute();
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $tasks;
    }
    public function getTaskByName($task_name)
    {
        $req = "SELECT * FROM workshop WHERE task_name = :task_name";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":task_name", $task_name, PDO::PARAM_STR);
        $stmt->execute();
        $category = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $category;
    }
    public function isTaskByNameFree($task_name)
    {
        return (empty($this->getTaskByName($task_name)));
    }
}
