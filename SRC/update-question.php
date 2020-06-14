<?php 
include('function.php');
$connect=getConnection();

if (!$connect){ // Contrôler la connexion

    $MessageConnexion = die ("connection impossible");
}
else { 
    $recup=$connect->prepare(" SELECT * FROM `creerquestion` WHERE id=?");
        $recup-> execute([$_POST['id']]);
        $reste=$recup->fetch(PDO::FETCH_OBJ);

        $recup2=$connect->prepare(" SELECT * FROM `reponsequestion` WHERE id_creerquestion=?");
        $recup2-> execute([$_POST['id']]);
        $reste2=$recup2->fetch();

        
if($reste->reponse=='texte'){
    $rep="";
    
    $id=$_POST['id'];
    $rep.="<input type='hidden' name='id' value='$id'><br>";
$rep.="<textarea name='question' id='question'cols='60' rows='5' style='border-radius:2px' class='groupA'>$reste->question</textarea><br>";
    
    $rep.="<input type='number'  name='point' value='$reste->point'><br>";
    $rep.="<input type='text' name='reponse' value='$reste->reponse'><br>";
    
    $p=$reste2['reponses'];
    $rep.="<input type='text' name='reponses' value='$p'><br>";
    $rep.="<button type='submit' id='modification'>Modifier</button>";
    echo $rep;
}
if($reste->reponse=='simple'){
    $recup2=$connect->prepare(" SELECT * FROM `reponsequestion` WHERE id_creerquestion=?");
        $recup2-> execute([$_POST['id']]);
        $reste2=$recup2->fetchAll();
$j=1;
    $rep="";
    $id=$_POST['id'];
    $rep.="<input type='hidden' name='id' value='$id'><br>";
    $rep.="<textarea name='question' id='question'cols='60' rows='5' style='border-radius:2px' class='groupA'>$reste->question</textarea><br>";
    $rep.="<input type='number'  name='point' value='$reste->point'><br>";
    $rep.="<input type='text' name='reponse' value='$reste->reponse'><br>";
foreach($reste2 as $key){
  

if($key['etat']=='true'){
    $ps=$key['reponses'];
    $psid=$key['id'];
    $rep.="<input type='text' name='reponses[]' value='$ps'>";
    $rep.="<input type='radio' name='reposes' value='$j'><br>";
    $rep.="<input type='hidden' name='ids$j' value='$psid'><br>";

 
}else{
    $ps=$key['reponses'];
    $psid=$key['id'];
    $rep.="<input type='text' name='reponses[]' value='$ps'>";
    $rep.="<input type='radio' name='reposes' value='$j'><br>";
    $rep.="<input type='hidden' name='ids$j' value='$psid'><br>";

}
$j++;
}
$rep.="<button type='submit' id='modification'>Modifier</button>";

    echo $rep;
}




if($reste->reponse=='multiple'){
    $recup2=$connect->prepare(" SELECT * FROM `reponsequestion` WHERE id_creerquestion=?");
        $recup2-> execute([$_POST['id']]);
        $reste2=$recup2->fetchAll();

    $rep="";
    $id=$_POST['id'];
    $rep.="<input type='hidden' name='id' value='$id'><br>";
    $rep.="<textarea name='question' id='question'cols='60' rows='5' style='border-radius:2px' class='groupA'>$reste->question</textarea><br>";
    $rep.="<input type='number'  name='point' value='$reste->point'><br>";
    $rep.="<input type='text' name='reponse' value='$reste->reponse'><br>";
    $l=1;
foreach($reste2 as $key){
  
    $psid=$key['id'];
if($key['etat']=='true'){
    $ps=$key['reponses'];
    $rep.="<input type='text' name='reponses[]' value='$ps'><br>";
    $rep.="<input type='checkbox' name='reposes[]'checked value='$l'><br>";
    $rep.="<input type='hidden' name='ids$l' value='$psid'><br>";

 
}else{
    $ps=$key['reponses'];

    $rep.="<input type='text' name='reponses[]' value='$ps'><br>";
    $rep.="<input type='checkbox' name='reposes[]' value='$l'><br>";
    $rep.="<input type='hidden' name='ids$l' value='$psid'><br>";

}
$l++;
}
$rep.="<button type='submit' id='modification'>Modifier</button>";

    echo $rep;
}













}


 




?>