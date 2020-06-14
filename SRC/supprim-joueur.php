<?php

include('function.php');
$connect=getConnection();

if (!$connect){ // Contrôler la connexion

    $MessageConnexion = die ("connection impossible");
}
else { 

    if(isset($_POST["id"])){
       
        $id = $_POST['id'];
        $delete=$connect->prepare("DELETE FROM user WHERE id=:id");

        if ($delete-> execute(['id'=>$id])){

            $messageS="le joueur a été supprimé.";
        }else{
            $messageS="Echec de suppression.";
        }
            
        echo $messageS;

    }


}



?>