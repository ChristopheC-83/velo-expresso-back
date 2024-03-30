<?php

require_once("./models/pdo.model.php");
class MainManager extends Model
{

    public function getUserInfo($user_name)
    {
        $req = "SELECT * FROM users WHERE user_name = :user_name";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":user_name", $user_name, PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat;
    }
    public function getPasswordUser($user_name)
    {
        $req = "SELECT user_password FROM users WHERE user_name = :user_name";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":user_name", $user_name, PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat['user_password'];
    }
    public function isCombinationValid($user_name, $user_password)
    {
        $passwordDB = $this->getPasswordUser($user_name);
        return password_verify($user_password, $passwordDB);
    }


    public function getItemByPosition($position, $table)
    {
        $req = "SELECT * FROM $table WHERE position = :position";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":position", $position, PDO::PARAM_INT);
        $stmt->execute();
        $category = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $category;
    }
   
    public function isPositionFreeGeneric($position, $table){ 
        // echo "position : $position";
        // echo "table : $table";
        return (empty($this->getItemByPosition($position, $table)));
    }
    public function getItemByName($name, $table)
    {
        $req = "SELECT * FROM $table WHERE name = :posinametion";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":name", $name, PDO::PARAM_INT);
        $stmt->execute();
        $category = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $category;
    }
   
    public function isNameFreeGeneric($name, $table){ 
        return (empty($this->getItemByName($name, $table)));
    }


}


