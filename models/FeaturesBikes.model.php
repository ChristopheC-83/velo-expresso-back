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

    public function  sendNewFeaturesDB( $feature, $position, $data ) {

        $req = 'INSERT INTO bike_data_features (feature, position, data) VALUES (:feature, :position, :data)';
        $stmt = $this->getDB()->prepare( $req );
        $stmt->bindValue( ':feature', $feature, PDO::PARAM_STR );
        $stmt->bindValue( ':position', $position, PDO::PARAM_INT );
        $stmt->bindValue( ':data', $data, PDO::PARAM_STR );
        $stmt->execute();
        $isValidate = ( $stmt->rowCount() > 0 );
        $stmt->closeCursor();
        return $isValidate;

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