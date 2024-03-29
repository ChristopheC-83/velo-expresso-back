<?php

require_once( './models/Main.model.php' );

class SliderManager extends MainManager
 {
    public function  getAllSlidersDB() {
        $req= "SELECT * FROM home_slider ORDER BY position";
        $stmt = $this->getDB()->prepare($req);
        $stmt->execute();
        $sliders = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $sliders;

    }

    public function  getSliderById( $slider_id ){
        $req= "SELECT * FROM home_slider WHERE slider_id = :slider_id";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":slider_id", $slider_id, PDO::PARAM_INT);
        $stmt->execute();
        $slider = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $slider;
    
    }

    public function  deleteSliderDB( $slider_id ) { 
        $req= "DELETE FROM home_slider WHERE slider_id = :slider_id";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":slider_id", $slider_id, PDO::PARAM_INT);
        $stmt->execute();
        $isValidate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isValidate;
    
    }

    public function  addSliderDB($position, $title, $btnText, $btnLink, $addedImage){
        $req= "INSERT INTO home_slider (position, title, btnText, btnLink, image) VALUES (:position, :title, :btnText, :btnLink, :image)";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":position", $position, PDO::PARAM_INT);
        $stmt->bindValue(":title", $title, PDO::PARAM_STR);
        $stmt->bindValue(":btnText", $btnText, PDO::PARAM_STR);
        $stmt->bindValue(":btnLink", $btnLink, PDO::PARAM_STR);
        $stmt->bindValue(":image", $addedImage, PDO::PARAM_STR);
        $stmt->execute();
        $isValidate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isValidate;
    }
}