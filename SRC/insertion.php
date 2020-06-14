<?php

include("function.php");
$insert=getConnection();

if (!$insert){ // Contrôler la connexion

    $MessageConnexion = die ("connection impossible");
}
else {

        $nom=$_POST["nom"];
        $prenom=$_POST["prenom"];
        $login= $_POST["login"];
        $password= $_POST["password"];
       

        $user_id = $_POST['login'];
        $file_name = $_FILES['file']['name'];
        $file_extension= strrchr($file_name,".");
        $file_tmp_name = $_FILES['file']['tmp_name'];
        $file_dest='../IMAGE/'.$user_id.$file_extension;

        $extension_autorises=array('.jpeg','.png','.JPEG','.PNG');
        if(in_array($file_extension,$extension_autorises)){//verifier extension image
        if(move_uploaded_file($file_tmp_name,$file_dest)){//verifier si image a ete enregistrée


            }else {}
            

        }else {}
        

        $avatar=$file_dest ;
        $role="joueur";
        $joueur=$insert->prepare("INSERT INTO user (id,login,nom,prenom,password,avatar,role) VALUES (NULL,'$login','$nom','$prenom','$password','$avatar','$role')");
        $joueur->execute();




}

?>