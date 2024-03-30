<?php

require_once("./models/Main.model.php");

class RentalManager extends MainManager
{


    public function getRentals()
    {
        $req = "SELECT * FROM rentals ORDER BY position";
        $stmt = $this->getDB()->prepare($req);
        $stmt->execute();
        $rentals = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $rentals;
    }
    public function  addRentalDB($name, $position, $half_day, $day, $extra_day, $week)
    {
        $req = "INSERT INTO rentals (name, position, half_day, day, extra_day, week) VALUES (:name, :position, :half_day, :day, :extra_day, :week)";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->bindValue(":position", $position, PDO::PARAM_INT);
        $stmt->bindValue(":half_day", $half_day, PDO::PARAM_INT);
        $stmt->bindValue(":day", $day, PDO::PARAM_INT);
        $stmt->bindValue(":extra_day", $extra_day, PDO::PARAM_INT);
        $stmt->bindValue(":week", $week, PDO::PARAM_INT);
        $stmt->execute();
        $isValidate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isValidate;
    }

    public function  getRentalById($id)
    {
        $req = "SELECT * FROM rentals WHERE id = :id";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $rental = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $rental;
    }

    public function getRentalByItem($name)
    {
        $req = "SELECT * FROM rentals WHERE name = :name";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->execute();
        $rental = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $rental;
    }


    public function  updateRentalDB($id, $name, $position, $half_day, $day, $extra_day, $week)
    {
        $req = "UPDATE rentals SET name = :name, position = :position, half_day = :half_day, day = :day, extra_day = :extra_day, week = :week WHERE id = :id";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->bindValue(":position", $position, PDO::PARAM_INT);
        $stmt->bindValue(":half_day", $half_day, PDO::PARAM_INT);
        $stmt->bindValue(":day", $day, PDO::PARAM_INT);
        $stmt->bindValue(":extra_day", $extra_day, PDO::PARAM_INT);
        $stmt->bindValue(":week", $week, PDO::PARAM_INT);
        $stmt->execute();
        $isValidate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isValidate;
    }

    public function deleteRentalDB($id)
    {
        $req = "DELETE FROM rentals WHERE id = :id";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $isValidate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isValidate;
    }

    public function  getTextUnderArrayRentals(){ 
        $req = "SELECT * FROM rental_text WHERE text_rental_id = 1";
        $stmt = $this->getDB()->prepare($req);
        $stmt->execute();
        $text = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $text;
    
    }

    
    
  

    public function updateTextUnderArrayRentals($text){ 
        $req = "UPDATE rental_text SET text_rental = :text WHERE text_rental_id = 1";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":text", $text, PDO::PARAM_STR);
        $stmt->execute();
        $isValidate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isValidate;
    
    }
}
