<?php

require_once( './models/Main.model.php' );

class FramesManager extends MainManager
 {
    public function  getAllFramesDB() {
        $req= "SELECT * FROM home_frame ORDER BY position";
        $stmt = $this->getDB()->prepare($req);
        $stmt->execute();
        $frames = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $frames;

    }

    public function  getFrameById( $id ){
        $req= "SELECT * FROM home_frame WHERE id = :id";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $frame = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $frame;
    
    }

    public function  deleteFrameDB( $id ) { 
        $req= "DELETE FROM home_frame WHERE id = :id";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $isValidate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isValidate;
    
    }

    public function  addFrameDB($position, $title,$text, $btnText, $btnLink, $addedImage){
        $req= "INSERT INTO home_frame (position, title, text,btnText, btnLink, image) VALUES (:position, :title, :text,:btnText, :btnLink, :image)";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":position", $position, PDO::PARAM_INT);
        $stmt->bindValue(":title", $title, PDO::PARAM_STR);
        $stmt->bindValue(":text", $text, PDO::PARAM_STR);
        $stmt->bindValue(":btnText", $btnText, PDO::PARAM_STR);
        $stmt->bindValue(":btnLink", $btnLink, PDO::PARAM_STR);
        $stmt->bindValue(":image", $addedImage, PDO::PARAM_STR);
        $stmt->execute();
        $isValidate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isValidate;
    }

    public function  updateFrameDB( $id, $position, $title,$text, $btnText, $btnLink ){ 
        $req= "UPDATE home_frame SET position = :position, title = :title, text = :text, btnText = :btnText, btnLink = :btnLink WHERE id = :id";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":position", $position, PDO::PARAM_INT);
        $stmt->bindValue(":title", $title, PDO::PARAM_STR);
        $stmt->bindValue(":text", $text, PDO::PARAM_STR);
        $stmt->bindValue(":btnText", $btnText, PDO::PARAM_STR);
        $stmt->bindValue(":btnLink", $btnLink, PDO::PARAM_STR);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $isValidate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isValidate;
    
    
    }

   
}