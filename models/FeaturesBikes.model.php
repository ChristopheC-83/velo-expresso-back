<?php

require_once( './models/Main.model.php' );

class FeaturesBikesManager extends MainManager
 {
    public function  getAllFeatures() {

        $req = 'SELECT * FROM bike_features';
        $stmt = $this->getDB()->prepare( $req );
        $stmt->execute();
        $features = $stmt->fetchAll( PDO::FETCH_ASSOC );
        $stmt->closeCursor();
        return $features;

    }

    public function getAllDatasFeatures() {

        $req = 'SELECT * FROM bike_data_features ORDER BY position';
        $stmt = $this->getDB()->prepare( $req );
        $stmt->execute();
        $features = $stmt->fetchAll( PDO::FETCH_ASSOC );
        $stmt->closeCursor();
        return $features;

    }

    public function  sendNewFeaturesDB( $feature, $position, $name ) {

        $req = 'INSERT INTO bike_data_features (feature, position, name) VALUES (:feature, :position, :name)';
        $stmt = $this->getDB()->prepare( $req );
        $stmt->bindValue( ':feature', $feature, PDO::PARAM_STR );
        $stmt->bindValue( ':position', $position, PDO::PARAM_INT );
        $stmt->bindValue( ':name', $name, PDO::PARAM_STR );
        $stmt->execute();
        $isValidate = ( $stmt->rowCount() > 0 );
        $stmt->closeCursor();
        return $isValidate;

    }

    public function getFeatureByPosition($feature,$position, $table)
    {
        $req = "SELECT * FROM $table WHERE position = :position AND feature = :feature";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":position", $position, PDO::PARAM_INT);
        $stmt->bindValue(":feature", $feature, PDO::PARAM_STR);
        $stmt->execute();
        $category = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $category;
    }
   
    public function isPositionFree($feature,$position, $table){ 
        // echo "position : $position";
        // echo "table : $table";
        return (empty($this->getFeatureByPosition($feature,$position, $table)));
    }
    public function getFeatureByName($feature,$name, $table)
    {
        $req = "SELECT * FROM $table WHERE name = :name AND feature = :feature";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->bindValue(":feature", $feature, PDO::PARAM_STR);
        $stmt->execute();
        $category = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $category;
    }
   
    public function isNameFree($feature,$name, $table){ 
        return (empty($this->getFeatureByName($feature,$name, $table)));
    }

    public function  deleteFeatureDB($id){
        $req = 'DELETE FROM bike_data_features WHERE id = :id';
        $stmt = $this->getDB()->prepare( $req );
        $stmt->bindValue( ':id', $id, PDO::PARAM_INT );
        $stmt->execute();
        $isValidate = ( $stmt->rowCount() > 0 );
        $stmt->closeCursor();
        return $isValidate;
    
    }

}