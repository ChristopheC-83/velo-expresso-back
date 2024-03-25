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

    public function  getPartnerById($id_partner){
        $req = "SELECT * FROM partners WHERE id_partner = :id_partner";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":id_partner", $id_partner, PDO::PARAM_INT);
        $stmt->execute();
        $partner = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $partner;
    
    
    }

    public function  deletePartnerDB($id_partner)
    {
        $req = "DELETE FROM partners WHERE id_partner = :id_partner";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":id_partner", $id_partner, PDO::PARAM_INT);
        $stmt->execute();
        $isValidate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isValidate;
    }
}
