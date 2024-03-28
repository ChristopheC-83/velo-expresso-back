<?php
require_once("perso.php");
abstract class Model{
    private static $pdo;
    private static $pdo2;
    private static function setDB(){
        try {
            //connexion à notre BDD, à modifier pour site en construction
            self::$pdo = new PDO(
                "mysql:host=" . mysql . ";dbname=" . dbname,
                user,
                mdpbd,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING] //ou ERRMODE_EXCEPTION à la place de WARNING
            );
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
        return self::$pdo;
    }
    private static function setDB2(){
        try {
            //connexion à notre BDD, à modifier pour site en construction
            self::$pdo2 = new PDO(
                "mysql:host=" . mysql2 . ";dbname=" . dbname2,
                user2,
                mdpbd2,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING] //ou ERRMODE_EXCEPTION à la place de WARNING
            );
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
        return self::$pdo;
    }

    // connexion par getDB qui teste si la connexion est déjà établie. On evite doublon de connexion.
    protected function getDB(){
        if(self::$pdo === null){
            self::setDB();
        }
        return self::$pdo;
    }
    protected function getDB2(){
        if(self::$pdo2 === null){
            self::setDB2();
        }
        return self::$pdo2;
    }
}