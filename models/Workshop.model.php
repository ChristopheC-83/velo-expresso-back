<?php 

require_once("./models/Main.model.php");

class WorkshopManager extends MainManager
{

    public function getCategories()
    {
        $req = "SELECT * FROM workshop_categories ORDER BY cat_position";
        $stmt = $this->getDB()->prepare($req);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $categories;
    }

    public function createNewCategory($cat_name, $cat_position){ 
    
        $req = "INSERT INTO workshop_categories (cat_name, cat_position) VALUES (:cat_name, :cat_position)";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":cat_name", $cat_name, PDO::PARAM_STR);
        $stmt->bindValue(":cat_position", $cat_position, PDO::PARAM_STR);
        $stmt->execute();
        $isValidate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isValidate;
    
    }

}