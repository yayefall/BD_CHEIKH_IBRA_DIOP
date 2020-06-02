<?php   
    function getConnection()
    {
        $host = "localhost";
        $db_name = "bd-cheikh-ibra";
        $username = "root";
        $password = "";

        $connexion = null;
        try{
            $connexion = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $connexion->exec("set names utf8");

        }catch(PDOException $exception){
            echo "Erreur de connexion : " . $exception->getMessage();
        }
        return $connexion ;
    }

?> 