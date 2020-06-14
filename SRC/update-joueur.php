<?php 


include('function.php');
$connect=getConnection();

if (!$connect){ // Contrôler la connexion

    $MessageConnexion = die ("connection impossible");
}
else { 
//echo json_encode($_POST);
//var_dump( $_FILES);
//exit();
    if(!empty($_POST)){
        $id=$_POST['idJoueur'];
       
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

    $update=$connect->prepare("UPDATE user SET  nom = ?, prenom = ?, login = ?, password = ?, avatar = ?,role=? WHERE id =?");
     $update-> execute([$nom,$prenom,$login,$password,$avatar,$role,$id]);
    
        if ($update-> execute()){

            $messageS="le joueur a été modifié.";
        }else{
            $messageS="Echec de modification.";
        }
            
       echo $messageS;

    }


}





?>