<?php


abstract class Tools
{
    public static function showArray($array)
    {
        // fonction pour afficher un tableau de manière lisible
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }

    public static function showAlert($message, $type = 'alert-danger')
    {
        // fonction pour ajouter un message d'alerte à la session. un fichier JS permet de supprimer le message au bout de 3 secondes.
        $_SESSION['alert']['message'] = $message;
        $_SESSION['alert']['type'] = $type;
    }
    public static function secureHTML($string)
    {
        return htmlentities($string);
    }

    public static function isConnected()
    {
        return (!empty($_SESSION['user_name']));
    }
  
    public static function  sendJson($data)
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public static function  sendJson_get($data)
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function hashFunction($psw)
    {
        $hashedPsw = password_hash($psw, PASSWORD_DEFAULT);
        return $hashedPsw;
    } 
}
