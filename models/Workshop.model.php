<?php

require_once("./models/Main.model.php");

class WorkshopManager extends MainManager
{

    // Les catégories
    public function getCategories()
    {
        $req = "SELECT * FROM workshop_categories ORDER BY position";
        $stmt = $this->getDB()->prepare($req);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $categories;
    }
    public function getCategoryById($id)
    {
        $req = "SELECT * FROM workshop_categories WHERE id = :id";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $category = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $category;
    }
    public function getCategoryByPosition($position)
    {
        $req = "SELECT * FROM workshop_categories WHERE position = :position";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":position", $position, PDO::PARAM_INT);
        $stmt->execute();
        $category = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $category;
    }
    public function isPositionFree($position)
    {
        return (empty($this->getCategoryByPosition($position)));
    }
    public function getCategoryByName($name)
    {
        $req = "SELECT * FROM workshop_categories WHERE name = :name";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->execute();
        $category = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $category;
    }
    public function isCategoryNameFree($name)
    {
        return (empty($this->getCategoryByName($name)));
    }
    public function createNewCategory($name, $position)
    {
        $req = "INSERT INTO workshop_categories (name, position) VALUES (:name, :position)";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->bindValue(":position", $position, PDO::PARAM_STR);
        $stmt->execute();
        $isValidate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isValidate;
    }
    public function updateCategory($id, $name, $position)
    {
        $req = "UPDATE workshop_categories SET name = :name, position = :position WHERE id = :id";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->bindValue(":position", $position, PDO::PARAM_INT);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $isValidate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isValidate;
    }
    public function deleteCategoryFromDB($id)
    {
        $req = "DELETE FROM workshop_categories WHERE id = :id";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $isValidate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isValidate;
    }


    //  les taches


    public function getAllTasks(){
        $req = "SELECT * FROM workshop ORDER BY position";
        $stmt = $this->getDB()->prepare($req);
        $stmt->execute();
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $tasks;
    }

    public function createNewTask($task_category, $name, $position, $task_price)
    {

        $req = "INSERT INTO workshop (task_category, name,position, task_price) VALUES (:task_category,:name, :position, :task_price)";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":task_category", $task_category, PDO::PARAM_STR);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->bindValue(":position", $position, PDO::PARAM_INT);
        $stmt->bindValue(":task_price", $task_price, PDO::PARAM_INT);
        $stmt->execute();
        $isValidate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isValidate;
    }

    public function  getTasksByCategory($task_category)
    {
        $req = "SELECT * FROM workshop WHERE task_category = :task_category ORDER BY position";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":task_category", $task_category, PDO::PARAM_STR);
        $stmt->execute();
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $tasks;
    }
    // public function getTaskByName($name)
    // {
    //     $req = "SELECT * FROM workshop WHERE name = :name";
    //     $stmt = $this->getDB()->prepare($req);
    //     $stmt->bindValue(":name", $name, PDO::PARAM_STR);
    //     $stmt->execute();
    //     $category = $stmt->fetch(PDO::FETCH_ASSOC);
    //     $stmt->closeCursor();
    //     return $category;
    // }
    // public function isTaskByNameFree($name)
    // {
    //     return (empty($this->getTaskByName($name)));
    // }
    public function deleteTaskFromDB($id)
    {
        $req = "DELETE FROM workshop WHERE id = :id";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $isValidate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isValidate;
    }

    public function getTaskById($id)
    {
        $req = "SELECT * FROM workshop WHERE id = :id";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $task = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $task;
    }

    public function getTaskByPosition($position, $task_category){ 
        $req = "SELECT * FROM workshop WHERE position = :position AND task_category = :task_category";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":position", $position, PDO::PARAM_INT);
        $stmt->bindValue(":task_category", $task_category, PDO::PARAM_STR);
        $stmt->execute();
        $task = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $task;
    }

    public function isPositionTaskFree($id, $task_category)
    {
        return (empty($this->getTaskByPosition($id, $task_category)));
    }



    public function  updateTask($id, $name, $position, $task_price){
        $req = "UPDATE workshop SET name = :name, position = :position, task_price = :task_price WHERE id = :id";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->bindValue(":position", $position, PDO::PARAM_INT);
        $stmt->bindValue(":task_price", $task_price, PDO::PARAM_INT);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $isValidate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isValidate;
    }

    // Api

    
}
