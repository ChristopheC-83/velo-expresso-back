<?php 

require_once("./models/Main.model.php");

class BikesManager extends MainManager
{
    public function  createNewBikeDB($infos_new_bike){ 
        $req = "INSERT INTO bikes (bike_visibility, bike_brand, bike_model, bike_new, bike_type, bike_size, bike_suspension, bike_speeds_number, bike_transmission, bike_wheels_dim, bike_wheels, bike_brake, bike_elec, bike_elec_detail, bike_price, bike_promo, bike_price_promo, bike_picture, bike_description, bike_msg_perso) VALUES (:bike_visibility, :bike_brand, :bike_model, :bike_new, :bike_type, :bike_size, :bike_suspension, :bike_speeds_number, :bike_transmission, :bike_wheels_dim, :bike_wheels, :bike_brake, :bike_elec, :bike_elec_detail, :bike_price, :bike_promo, :bike_price_promo,:bike_picture, :bike_description, :bike_msg_perso)";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":bike_visibility", $infos_new_bike['bike_visibility'], PDO::PARAM_INT);
        $stmt->bindValue(":bike_brand", $infos_new_bike['bike_brand'], PDO::PARAM_STR);
        $stmt->bindValue(":bike_model", $infos_new_bike['bike_model'], PDO::PARAM_STR);
        $stmt->bindValue(":bike_new", $infos_new_bike['bike_new'], PDO::PARAM_STR);
        $stmt->bindValue(":bike_type", $infos_new_bike['bike_type'], PDO::PARAM_STR);
        $stmt->bindValue(":bike_size", $infos_new_bike['bike_size'], PDO::PARAM_STR);
        $stmt->bindValue(":bike_suspension", $infos_new_bike['bike_suspension'], PDO::PARAM_STR);
        $stmt->bindValue(":bike_speeds_number", $infos_new_bike['bike_speeds_number'], PDO::PARAM_STR);
        $stmt->bindValue(":bike_transmission", $infos_new_bike['bike_transmission'], PDO::PARAM_STR);
        $stmt->bindValue(":bike_wheels_dim", $infos_new_bike['bike_wheels_dim'], PDO::PARAM_STR);
        $stmt->bindValue(":bike_wheels", $infos_new_bike['bike_wheels'], PDO::PARAM_STR);
        $stmt->bindValue(":bike_brake", $infos_new_bike['bike_brake'], PDO::PARAM_STR);
        $stmt->bindValue(":bike_elec", $infos_new_bike['bike_elec'], PDO::PARAM_INT);
        $stmt->bindValue(":bike_elec_detail", $infos_new_bike['bike_elec_detail'], PDO::PARAM_STR);
        $stmt->bindValue(":bike_price", $infos_new_bike['bike_price'], PDO::PARAM_INT);
        $stmt->bindValue(":bike_promo", $infos_new_bike['bike_promo'], PDO::PARAM_INT);
        $stmt->bindValue(":bike_price_promo", $infos_new_bike['bike_price_promo'], PDO::PARAM_INT);
        $stmt->bindValue(":bike_picture", $infos_new_bike['picture'], PDO::PARAM_STR);
        $stmt->bindValue(":bike_description", $infos_new_bike['bike_description'], PDO::PARAM_STR);
        $stmt->bindValue(":bike_msg_perso", $infos_new_bike['bike_msg_perso'], PDO::PARAM_STR);
        $stmt->execute();
        $isValidate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isValidate;
    }

}