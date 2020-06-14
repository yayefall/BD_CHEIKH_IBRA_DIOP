<?php
 //var_dump($_POST);exit();
include('function.php');
$connect=getConnection();

if (!$connect){ // Contrôler la connexion

    $MessageConnexion = die ("connection impossible");
}
else { 
    
    if(!empty($_POST) ){
        
       
            //var_dump($question);

        $select = $connect->prepare("DELETE FROM`creerquestion` WHERE id=?");
        $select->execute([$_POST['id']]);
        
        $select1 = $connect->prepare("DELETE FROM`reponsequestion` WHERE id_creerquestion=?");
        $select1->execute([$_POST['id']]);


   


    }  


}
  



?>