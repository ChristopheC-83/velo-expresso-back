<?php

require_once("./models/pdo.model.php");
class MainManager extends Model
{

    public function getUserInfo($user_name)
    {
        $req = "SELECT * FROM users WHERE user_name = :user_name";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":user_name", $user_name, PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat;
    }
    public function getPasswordUser($user_name)
    {
        $req = "SELECT user_password FROM users WHERE user_name = :user_name";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":user_name", $user_name, PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat['user_password'];
    }
    public function isCombinationValid($user_name, $user_password)
    {
        $passwordDB = $this->getPasswordUser($user_name);
        return password_verify($user_password, $passwordDB);
    }
}
