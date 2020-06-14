<?php 


include('function.php');
$connect=getConnection();

if (!$connect){ // Contrôler la connexion

    $MessageConnexion = die ("connection impossible");
}
else {
//var_dump($_POST);
if($_POST['reponse']=='texte'){
    $recup=$connect->prepare(" UPDATE creerquestion SET question=?,point=?,reponse=? WHERE id=?");
        $recup-> execute([$_POST['question'],$_POST['point'],$_POST['reponse'],$_POST['id']]);

        $recu=$connect->prepare(" UPDATE reponsequestion SET reponses=?,etat=? WHERE id_creerquestion=?");
        $etat='true';
        $recu-> execute([$_POST['reponses'],$etat,$_POST['id']]);

}
if($_POST['reponse']=='simple'){
    $recup=$connect->prepare(" UPDATE creerquestion SET question=?,point=?,reponse=? WHERE id=?");
    $recup-> execute([$_POST['question'],$_POST['point'],$_POST['reponse'],$_POST['id']]);
   // var_dump($_POST['reposes']);
    $j=1;
    
foreach ($_POST['reponses'] as $keys) {
    //echo $key;
    $ids=$_POST["ids$j"];
 if($_POST['reposes']== $j){
    // echo $key;
     $etats='true';
    
 }else{
  
    $etats='false';
   
 }
 echo $keys;
 echo $ids;
 $recd=$connect->prepare(" UPDATE reponsequestion SET reponses=?,etat=? WHERE id_creerquestion=? AND id=?");
    $recd-> execute([$keys,$etats,$_POST['id'], $ids]);
 $j++;
}

}




if($_POST['reponse']=='multiple'){
    $recup=$connect->prepare(" UPDATE creerquestion SET question=?,point=?,reponse=? WHERE id=?");
    $recup-> execute([$_POST['question'],$_POST['point'],$_POST['reponse'],$_POST['id']]);
   // var_dump($_POST['reposes']);
    $j=1;
    var_dump($_POST['reponses']);
foreach ($_POST['reponses'] as $keys) {
    //echo $key;
    $ids=$_POST["ids$j"];
    $bool=false;
    foreach ($_POST['reposes'] as $val ) {
        if($val== $j){
            $bool=true;
             $etats='true';
            
         }
    }
if($bool==true){
    $etats='true';
}else{
    $etats='false';
}
 echo $keys;
 echo $ids;
 $recd=$connect->prepare(" UPDATE reponsequestion SET reponses=?,etat=? WHERE id_creerquestion=? AND id=?");
    $recd-> execute([$keys,$etats,$_POST['id'], $ids]);
 $j++;
}


}

if($_POST['reponse']=='rty'){

    $recup=$connect->prepare(" UPDATE creerquestion SET question=?,point=?,reponse=? WHERE id=?");
    $recup-> execute([$_POST['question'],$_POST['point'],$_POST['reponse'],$_POST['id']]);

    $recu=$connect->prepare(" UPDATE reponsequestion SET reponses=?,etat=? WHERE id_creerquestion=?");

}



}



?>