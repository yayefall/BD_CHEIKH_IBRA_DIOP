<?php 
include("function.php");

if(isset($_POST['valider'])){

    if(!empty($_POST['question']) && !empty($_POST['point'] ) && !empty($_POST['reponse'])){
    $question=$_POST['question'];
    $point=$_POST['point'];
    $reponse=$_POST['reponse'];
   


     //la connexion a la base de donnée
    $cnx = getConnection();
     // preparation de la requete d'insertion
    $state = $cnx->prepare("INSERT INTO creerQuestion(question,point,reponse) VALUES(:question,:point,:reponse)");
      // execution de la requete preparée
    $result= $state->execute(array(

          "question"=>$question,
          "point"=>$point,
          "reponse"=>$reponse,
         

    ));


    if($result){
        $message="la question a été enrégistrée";

    }else{
        $message=" Echec d'enregitrement";
        
    }

    echo  $message;  

    

    }else{
        echo"<p style='color:red'><strong>Tous les champs sont obligatoire *!!</strong></p>";
    }
}


?>



<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>
  <body>
      
<style> span {color:red;font-size:10px; }</style>
     
     <div class="bg-white float-left col-lg-5 p-2"> 
            <div style="color:rgba(0, 128, 122, 0.774); text-align:center"><h3>PARAMETRER VOTRE QUESTION</h3></div>
            <div class="creer-question">
                 <form action="" method="POST" ><br>
                     <label for=""><strong>Question </strong></label>
                 <textarea name="question" id="question" cols="60" rows="5" style="border-radius:2px"></textarea><br><br>
                     <span id="question_error"></span><br>
                     <label for=""> <strong> Nbre de points</strong> </label>
                     <select style="width:50px;height:30px" name="point"  id="point">
                         <option > </option>
                         <option > 1</option>
                         <option >45</option>
                         <option >30</option>
                         <option >3</option>
                         <option >4</option>
                         <option >5</option>
                         <option >16</option>
                         <option >20</option>
                         <option>10</option>
                         <option>8</option>
                         <option >2</option>
                    </select> <br><br>                               
                     <span id="point_error"></span>

                 <div class="row" id="row_0">
                     <label for=""> <strong>Type de réponse</strong></label>
                     <select style="width:300px;height:40px" name="reponse" id="reponse">
                         <option value=""></option>
                         <option>Donner le type de réponse</option>
                         <option   value="simple">Choix simple</option>  
                         <option  value="multiple" > Choix multiple</option>  
                         <option value="texte">Réponse texte </option>   
                     </select>  
                     <span id="reponse_error"></span> 
                     <button type="button"  id=" bouton" style="position:absolute; padding:0px ;margin:0px 0 0 427px "  onclick="onAddInput()" >
                     <img class="" src="../ASSET/IMG/ic-ajout-réponse.png" alt="" ><br>
                </div>
                <div id="inputs" label="nobre_0"> 

            </div>
            <input style="background-color:chocolate" type="submit" value="Enrégistrer" name="valider" id="validation">

          </div><!-- fin div creer question-->
      </div><!-- fin div bady-->
    
      </form>
       <!-- jquery et ajax  pour validation -->
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
    
    <!-- Optional JavaScript -->
    <script src="../ASSET/JS/creer-question.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>