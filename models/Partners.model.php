<?php

require_once("./models/Main.model.php");

class PartnersManager extends MainManager
{

    public function addPartnerDB($name, $link, $position, $addedLogo)
    {
        $req = "INSERT INTO partners (name, link, position, logo) VALUES (:name, :link, :position, :logo)";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->bindValue(":link", $link, PDO::PARAM_STR);
        $stmt->bindValue(":position", $position, PDO::PARAM_INT);
        $stmt->bindValue(":logo", $addedLogo, PDO::PARAM_STR);
        $stmt->execute();
        $isValidate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isValidate;
    }

    public function  getAllPartnersDB()
    {
        $req = "SELECT * FROM partners ORDER BY position";
        $stmt = $this->getDB()->prepare($req);
        $stmt->execute();
        $partners = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $partners;
    }

    public function  getPartnerById($id){
        $req = "SELECT * FROM partners WHERE id = :id";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $partner = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $partner;
    }

    public function  updatePartnerDB( $id, $name, $link, $position ) {
    
        $req = "UPDATE partners SET name = :name, link = :link, position = :position WHERE id = :id";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->bindValue(":link", $link, PDO::PARAM_STR);
        $stmt->bindValue(":position", $position, PDO::PARAM_INT);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $isValidate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isValidate;
    
    }

    public function  deletePartnerDB($id)
    {
        $req = "DELETE FROM partners WHERE id = :id";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $isValidate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isValidate;
    }
}
