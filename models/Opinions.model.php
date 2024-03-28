<?php

require_once( './models/Main.model.php' );

class OpinionsManager extends MainManager
 {
    public function  getAllOpinionsNotValidated() {
        $req = 'SELECT * FROM Opinion WHERE validated = 0 order by createdAt DESC';
        $stmt = $this->getDB2()->prepare( $req );
        $stmt->execute();
        $opinions = $stmt->fetchAll( PDO::FETCH_ASSOC );
        $stmt->closeCursor();
        return $opinions;


    }

    public function  getAllOpinionsValidated(){
        $req = 'SELECT * FROM Opinion WHERE validated = 1 order by createdAt DESC';
        $stmt = $this->getDB2()->prepare( $req );
        $stmt->execute();
        $opinions = $stmt->fetchAll( PDO::FETCH_ASSOC );
        $stmt->closeCursor();
        return $opinions;
    
    }

    public function  getAnOpinionById($id){
        $req = 'SELECT * FROM Opinion WHERE id = :id';
        $stmt = $this->getDB2()->prepare( $req );
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $opinion = $stmt->fetch( PDO::FETCH_ASSOC );
        $stmt->closeCursor();
        return $opinion;
    
    
    }

    public function deleteOpinionDB($id){
        $req = 'DELETE FROM Opinion WHERE id = :id';
        $stmt = $this->getDB2()->prepare( $req );
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
        return true;
    
    }

    public function addOpinionDB($id, $response){
        $req = 'UPDATE Opinion SET response = :response, validated = 1 WHERE id = :id';
        $stmt = $this->getDB2()->prepare( $req );
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->bindValue(':response', $response, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
        return true;
    
    }

    public function  updateOpinionDB($id, $response){
        $req = 'UPDATE Opinion SET response = :response WHERE id = :id';
        $stmt = $this->getDB2()->prepare( $req );
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->bindValue(':response', $response, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
        return true;
    
    
    }

}