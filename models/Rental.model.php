<?php

require_once("./models/Main.model.php");

class RentalManager extends MainManager
{

    public function  addRentalDB($item, $position, $half_day, $day, $extra_day, $week)
    {
        $req = "INSERT INTO rentals (item, position, half_day, day, extra_day, week) VALUES (:item, :position, :half_day, :day, :extra_day, :week)";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":item", $item, PDO::PARAM_STR);
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
}
