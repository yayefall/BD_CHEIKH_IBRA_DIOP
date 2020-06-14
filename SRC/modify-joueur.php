<?php

include('function.php');
$connect=getConnection();

if (!$connect){ // Contrôler la connexion

    $MessageConnexion = die ("connection impossible");
}
else { 
//var_dump($_POST);exit();
    if(isset($_POST["id"])){
        $id=$_POST['id'];
       /*
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $login= $_POST["login"];
    $password= $_POST["password"];
    $avatar=$file_name ;
    $role="joueur";*/
    
        $update=$connect->prepare(" SELECT `login`, `nom`, `prenom`, `password`, `avatar`, `role` FROM `user` WHERE id=:id");
        $update-> execute(["id"=>$id]);
        $rer=$update->fetch();
        echo json_encode($rer);
        if ($update-> execute(["id"=>$id])){

            $messageS="le joueur a été modifié.";
        }else{
            $messageS="Echec de modification.";
        }
            
     //   echo $messageS;

    }


}



?>