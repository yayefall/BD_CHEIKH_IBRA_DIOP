<?php

include("function.php");


    $insert=getConnection();

if (!$insert){ // Contrôler la connexion

    $MessageConnexion = die ("connection impossible");
}
else{

        if(!empty($_POST['question']) && !empty($_POST['reponse']) && !empty($_POST['point'])){
        
//var_dump($_POST);
    $question=$_POST["question"];
    $point=$_POST["point"];
    $reponse= $_POST["reponse"];
    $reponse_texte=$_POST["requette2"];
    $id_creerquestion="";

 $result= $insert-> prepare("INSERT INTO creerquestion(question,point,reponse) VALUES('$question','$point','$reponse')");

  if ($result-> execute()){

    $messageS="la question a été enrégistrée.";
  }else{
      $messageS="Echec d'enrégistrement.";
  }
    
echo $messageS;

$compter=$insert->prepare("SELECT MAX(id) FROM creerquestion");
$compter->execute();
$resultat=$compter->fetch();                   
         foreach($resultat as $value){

             $id_creerquestion=$value;
             
         }


         if($reponse=="texte"){

            $recupReponse=$insert->prepare("INSERT INTO `reponsequestion`(`reponses`, `etat`, `id_creerquestion`) VALUES (:Maquestion,:bonne,:idQuestion)");
            $val="true";
            $recupReponse->bindParam(":Maquestion",$reponse_texte);
            $recupReponse->bindParam(":bonne",$val);
            $recupReponse->bindParam(":idQuestion",$id_creerquestion );

            if ( $recupReponse-> execute()){

                $message="la question a été enrégistrée.";
              }else{
                  $message="Echec d'enrégistrement.";
              }
                
            echo $message;

            
         }

              $reponseRadios=[];
            if($reponse=="simple"){

                $recupReponse=$insert->prepare("INSERT INTO `reponsequestion`(`reponses`, `etat`, `id_creerquestion`) VALUES (:Maquestion,:bonne,:idQuestion)");

                for ($i=1; $i <= 10 ; $i++){
                    if(isset( $_POST["requette_$i"])){
                        $reponseRadios[]=$_POST["requette_$i"];

                        foreach($reponseRadios as $key){

                              $recupReponse->bindParam(":Maquestion",$key);
                              $recupReponse->bindParam(":idQuestion",$id_creerquestion);
                        }


                        if(isset($_POST["bonneReponse"]) && $_POST["bonneReponse"]==$i){

                            $true="true";
                            $recupReponse->bindParam(":bonne",$true);
                        }else{
                            $true="false";
                            $recupReponse->bindParam(":bonne",$true);
                        }

                        if ( $recupReponse-> execute()){

                            $messages="la question a été enrégistrée.";
                          }else{
                              $messages="Echec d'enrégistrement.";
                          }
                            
                        echo $messages;
            

                    }



                }



             }


           $reponsecheck=[];
        if($reponse=="multiple"){

           $recupReponse=$insert->prepare("INSERT INTO `reponsequestion`(`reponses`, `etat`, `id_creerquestion`) VALUES (:Maquestion,:bonne,:idQuestion)");

                    for ($i=1; $i <= 10 ; $i++){

                            if(isset( $_POST["requette_$i"])){
                                $reponsecheck[]=$_POST["requette_$i"];

                                foreach($reponsecheck as $valus){

                                    $recupReponse->bindParam(":Maquestion",$valus);
                                    $recupReponse->bindParam(":idQuestion",$id_creerquestion);
                                }
        
                                        if(isset( $_POST["BonneReponse$i"])){
                                        
                                            $bonnecheck[]= $_POST["BonneReponse$i"];

                                                $true="true";

                                                $recupReponse->bindParam(":bonne", $true);
            
                                            
                                        }else{

                                            $false="false";
                                            $recupReponse->bindParam(":bonne", $false);

                                          }
                
                                        if ( $recupReponse-> execute()){
                
                                            $messages="la question a été enrégistrée.";
                                          }else{
                                              $messages="Echec d'enrégistrement.";
                                          }
                                            
                                        echo $messages;
                            
            

                            }

                    }


        }

    
}else{
    echo"<p style='color:red'><strong>Tous les champs sont obligatoire*!</strong></p>";
}




}
?>